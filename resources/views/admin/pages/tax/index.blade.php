@extends('admin.layouts.app')

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
                        {{ __('Tax Settings') }}
                    </h2>
                    <h6>{{ __('These details will be used for the invoice.') }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

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

            <div class="row row-deck row-cards">
                {{-- Update tax setting --}}
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.update.tax.setting') }}" method="post" class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="row">
                                    {{-- Invoice Number Prefix --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Invoice Number Prefix') }} </label>
                                            <input type="text" class="form-control" name="invoice_prefix"
                                                placeholder="{{ __('Invoice Number Prefix') }}"
                                                value="{{ $config[15]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- Name --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Name') }} </label>
                                            <input type="text" class="form-control" name="invoice_name"
                                                placeholder="{{ __('Name') }}"
                                                value="{{ $config[16]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Email') }} </label>
                                            <input type="email" class="form-control" name="invoice_email"
                                                placeholder="{{ __('Email') }}"
                                                value="{{ $config[17]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Phone') }} </label>
                                            <input type="text" class="form-control" name="invoice_phone"
                                                placeholder="{{ __('Phone') }}"
                                                value="{{ $config[18]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- Address --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Address') }} </label>
                                            <textarea class="form-control" name="invoice_address" id="invoice_address"
                                                cols="10" rows="3" placeholder="{{ __('Address') }}"
                                                required>{{ $config[19]->config_value }}</textarea>
                                        </div>
                                    </div>

                                    {{-- City --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('City') }} </label>
                                            <input type="text" class="form-control" name="invoice_city"
                                                placeholder="{{ __('City') }}"
                                                value="{{ $config[20]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- State/Province --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('State/Province') }} </label>
                                            <input type="text" class="form-control" name="invoice_state"
                                                placeholder="{{ __('State/Province') }}"
                                                value="{{ $config[21]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- Zip Code --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('ZIP Code') }} </label>
                                            <input type="text" class="form-control" name="invoice_zipcode"
                                                placeholder="{{ __('ZIP Code') }}"
                                                value="{{ $config[22]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- Country --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Country') }} </label>
                                            <input type="text" class="form-control" name="invoice_country"
                                                placeholder="{{ __('Country') }}"
                                                value="{{ $config[23]->config_value }}" required>
                                        </div>
                                    </div>

                                    {{-- Tax Name --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Tax Name') }} </label>
                                            <input type="text" class="form-control" name="tax_name"
                                                placeholder="{{ __('Tax Name') }}"
                                                value="{{ $config[24]->config_value }}">
                                        </div>
                                    </div>

                                    {{-- Tax ID --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Tax ID') }} </label>
                                            <input type="text" class="form-control" name="tax_number"
                                                placeholder="{{ __('Tax ID') }}"
                                                value="{{ $config[26]->config_value }}">
                                        </div>
                                    </div>

                                    {{-- Tax Value --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Tax Value') }} </label>
                                            <input type="text" class="form-control" name="tax_value"
                                                placeholder="{{ __('Tax Value') }}"
                                                value="{{ $config[25]->config_value == "" ? 0 : $config[25]->config_value }}">
                                        </div>
                                    </div>

                                    {{-- Invoice Footer --}}
                                    <div class="col-md-4 col-xl-4">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Invoice Footer') }} </label>
                                            <textarea class="form-control" name="invoice_footer" id="invoice_footer"
                                                cols="10" rows="3" placeholder="{{ __('Invoice Footer') }}"
                                                required>{{ $config[29]->config_value }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Invoice Email Settings') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                {{-- Update email setting --}}
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.update.email.setting') }}" method="post" class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="row">
                                    {{-- Email Heading --}}
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Email Heading') }} </label>
                                            <textarea class="form-control" name="email_heading" id="email_heading"
                                                cols="30" rows="3" placeholder="{{ __('Email Heading') }}"
                                                required>{{ $config[27]->config_value }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Email footer --}}
                                    <div class="col-md-6 col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label required">{{ __('Email Footer') }} </label>
                                            <textarea class="form-control" name="email_footer" id="email_footer"
                                                cols="30" rows="3" placeholder="{{ __('Email Footer') }}"
                                                required>{{ $config[28]->config_value }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
@include('admin.includes.footer')

</div>
@endsection