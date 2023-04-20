@extends('user.layouts.app')

{{-- Custom CSS --}}
@section('custom-css')
<style>
    .border {
        border: 2px dotted #bbbcbe !important;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{ __('Overview') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('Recently Generated Code') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">

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
                    <svg xmlns="http://www.w3.org/2000/svg" class="alert-icon icon icon-tabler icon-tabler-check"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
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

            <div class="row row-cards row-deck mb-3">
                {{-- New code --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card border border-muted rounded">
                        <a href="{{ route('user.new.ai.code') }}" class="text-muted">
                            <div class="card-body text-center p-5" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="{{ __('New Code') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler-circle-plus" width="48"
                                    height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M9 12l6 0"></path>
                                    <path d="M12 9l0 6"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- Generated code --}}
                @foreach ($codes as $code)
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-red text-capitalize">{{ str_replace('-', ' ', $code->type)
                                    }}</span>
                                {{-- Actions --}}
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">{{ __('Actions') }}</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="{{ __('View') }}"
                                                href="{{ route('user.view.ai.code', $code->generate_id) }}">{{
                                                __('View')}}</a>
                                            <a class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="{{ __('Edit') }}"
                                                href="{{ route('user.edit.ai.code', $code->generate_id) }}">{{
                                                __('Edit')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="card-title text-uppercase my-1">{{ mb_strimwidth($code->name, 0, 32,
                                "...") }}
                            </h3>
                            <div class="text-muted">
                                {{ __('Allocated Words') }} : {{ $code->word_count }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex">
                                {{-- Last Updated --}}
                                <strong>{{ __('Last Updated on') }}: <span class="text-primary">{{
                                        $code->updated_at->diffForHumans()
                                        }}</span></strong>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 mt-5">
                    {{-- Pagination --}}
                    {{ $codes->links() }}
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('user.includes.footer')
    </div>
</div>
@endsection