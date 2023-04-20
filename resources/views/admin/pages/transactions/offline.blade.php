@extends('admin.layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="container-xl mt-3">

        {{-- Failed --}}
        @if (Session::has("failed"))
        <div class="alert alert-important alert-danger alert-dismissible" role="alert">
            <div class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="alert-icon icon icon-tabler icon-tabler-alert-circle"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <div>
                    {{Session::get('failed')}}
                </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
        @endif

        {{-- Success --}}
        @if(Session::has("success"))
        <div class="alert alert-important alert-success alert-dismissible" role="alert">
            <div class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="alert-icon icon icon-tabler icon-tabler-check" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
                <div>
                    {{Session::get('success')}}
                </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
        @endif

        {{-- Offline Transactions --}}
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Offline Transactions') }}</h3>
                </div>
                <div class="table-responsive px-2 py-2">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="table">
                        <thead>
                            <tr>
                                <th>{{ __('Transaction Date') }}</th>
                                <th>{{ __('Payment Trans ID') }}</th>
                                <th>{{ __('Customer Name') }}</th>
                                <th>{{ __('Gateway Name') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->created_at->format('d-m-Y H:i:s A') }}</td>
                                <td>{{ $transaction->transaction_id }}</td>
                                <td><a href="{{ route('admin.view.user', $transaction->userId)}}">{{ $transaction->name
                                        }}</a></td>
                                <td>
                                    {{ $transaction->name }}
                                </td>
                                <td>
                                    @foreach ($currencies as $currency)
                                    @if ($transaction->transaction_currency == $currency->iso_code)
                                    {{ $currency->symbol }}{{ $transaction->transaction_amount }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if ($transaction->payment_status == 'SUCCESS')
                                    <span class="badge bg-green">{{ __('Paid') }}</span>
                                    @endif
                                    @if ($transaction->payment_status == 'FAILED')
                                    <span class="badge bg-red">{{ __('Failed') }}</span>
                                    @endif
                                    @if ($transaction->payment_status == 'PENDING')
                                    <span class="badge bg-orange">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">

                                        @if ($transaction->invoice_number > 0)
                                        <a class="btn btn-primary btn-sm" target="_blank"
                                            href="{{ route('admin.view.invoice', ['id' => $transaction->id])}}">{{
                                            __('Invoice') }}</a>
                                        @endif
                                        @if ($transaction->payment_status != "SUCCESS")
                                        <a class="btn btn-primary btn-sm" href="#"
                                            onclick="getOfflineTransaction('{{ $transaction->id }}'); return false;">{{
                                            __('Success') }}</a>
                                        @endif
                                        @if ($transaction->payment_status != "PENDING")
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.offline.trans.status', ['id' => $transaction->id, 'status' => 'PENDING'])}}">{{
                                            __('Pending') }}</a>
                                        @endif
                                        @if ($transaction->payment_status != "FAILED")
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.offline.trans.status', ['id' => $transaction->id, 'status' => 'FAILED'])}}">{{
                                            __('Failed') }}</a>
                                        @endif
                                        @if ($transaction->payment_status != "SUCCESS" && $transaction->payment_status
                                        != "FAILED")
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.offline.trans.status', ['id' => $transaction->id, 'status' => 'FAILED'])}}">{{
                                            __('Failed') }}</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('admin.includes.footer')
</div>

{{-- Update transaction status --}}
<div class="modal modal-blur fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">{{ __('Are you sure?')}}</div>
                <div>{{ __('If you proceed with this transaction, If you proceed with this transaction, you will have payment status success and activate this plan.')}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">{{
                    __('Cancel')}}</button>
                <a class="btn btn-danger" id="transaction_id">{{ __('Yes, proceed')}}</a>
            </div>
        </div>
    </div>
</div>

{{-- Custom JS --}}
@section('custom-js')
<script>
    function getOfflineTransaction(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("transaction_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/offline-transaction-status/" + parameter + "/SUCCESS");
}
</script>
@endsection
@endsection