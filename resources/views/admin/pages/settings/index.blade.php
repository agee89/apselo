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
                    <h2 class="page-title mb-2">
                        {{ __('Settings') }}
                    </h2>
                    <span class="text-muted">{{ __('Note: Some fields are disabled. You can change the respective values directly from .env file.') }} <a href="https://aitoolsdocs.goapps.co.in/" target="_blank">{{
                            __('How should I do?') }}</a></span>
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

            {{-- Settings --}}
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordion-example">
                        {{-- General Configuration Settings --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="false">
                                    <h2>{{ __('General Configuration Settings') }}</h2>
                                </button>
                            </h2>
                            <div id="collapse-1" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <form action="{{ route('admin.change.general.settings') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            {{-- Show Website Frontend? --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="show_website">{{ __('Show Website Frontend?') }}</label>
                                                    <select name="show_website" id="show_website" class="form-control" required>
                                                        <option value="yes" {{ $config[43]->config_value == 'yes'
                                                            ? ' selected' : '' }}>
                                                            {{ __('Yes') }}</option>
                                                        <option value="no" {{ $config[43]->config_value == 'no'
                                                            ? ' selected' : '' }}>
                                                            {{ __('No') }}</option>
                                                    </select>
                                                    <small><strong><span class="text-danger">{{ __('Note') }}</span> : {{ __('If there is no website frontend, the website will automatically go to the login page.') }}</strong></small>
                                                </div>
                                            </div>

                                            {{-- Script Type --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="app_type">{{ __('Application Type') }}</label>
                                                    <select name="app_type" id="app_type" class="form-control" required>
                                                        <option value="BOTH" {{ env('APP_TYPE')=='BOTH'
                                                            ? ' selected' : '' }}>
                                                            {{ __('BOTH') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Timezone --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="timezone">{{ __('Timezone')
                                                        }}</label>
                                                    <select name="timezone" id="timezone" class="form-control" required>
                                                        @foreach (timezone_identifiers_list() as $timezone)
                                                        <option value="{{ $timezone }}" {{ $config[2]->config_value ==
                                                            $timezone ? ' selected' : '' }}>
                                                            {{ $timezone }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Currency --}}
                                            <div class="col-sm-4 col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="currency">{{ __('Currency')
                                                        }}</label>
                                                    <select class="tomselected form-select " name="currency" id="currency" required>
                                                        @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->iso_code }}" {{ $config[1]->
                                                            config_value == $currency->iso_code ? ' selected' : '' }}>
                                                            {{ $currency->name }} ({{ $currency->symbol }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Default Plan Term Settings --}}
                                        <div class="row">
                                            <div class="col-md-4 col-xl-4">
                                                <h2 class="page-title my-3">
                                                    {{ __('Default Plan Term Settings') }}
                                                </h2>
                                                <div class="mb-3">
                                                    <label class="form-label required" for="term">{{ __('Default Plan Term')
                                                        }}</label>
                                                    <select name="term" id="term" class="form-control" required>
                                                        <option value="monthly" {{ $config[8]->config_value == 'monthly'
                                                            ? '
                                                            selected' : '' }}>
                                                            {{ __('Monthly') }}</option>
                                                        <option value="yearly" {{ $config[8]->config_value == 'yearly' ?
                                                            '
                                                            selected' : '' }}>
                                                            {{ __('Yearly') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Cookie Consent Settings --}}
                                            <div class="col-md-4 col-xl-4">
                                                <h2 class="page-title my-3">
                                                    {{ __('Cookie Consent Settings') }}
                                                </h2>
                                                <div class="mb-3">
                                                    <label class="form-label required" for="cookie">{{ __('Cookie Consent Settings') }}</label>
                                                    <select name="cookie" id="cookie" class="form-control" required>
                                                        <option value="true" {{ env('COOKIE_CONSENT_ENABLED')=='true'
                                                            ? ' selected' : '' }}>
                                                            {{ __('Enable') }}</option>
                                                        <option value="false" {{ env('COOKIE_CONSENT_ENABLED')==''
                                                            ? ' selected' : '' }}>
                                                            {{ __('Disable') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Default Image Upload Limit --}}
                                            <div class="col-md-4 col-xl-4 mb-2">
                                                <h2 class="page-title my-3">
                                                    {{ __('Default Image Upload Limit') }}
                                                </h2>
                                                <div class="mb-3">
                                                    <label class="form-label" for="image_limit">{{ __('Size') }}
                                                    </label>
                                                    <input type="number" class="form-control" name="image_limit"
                                                        value="{{ $settings->image_limit['SIZE_LIMIT'] }}"
                                                        placeholder="{{ __('Size') }}" min="1024">
                                                </div>
                                            </div>

                                            {{-- Tawk Chat Settings --}}
                                            <div class="col-md-6 col-xl-6">
                                                <h2 class="page-title my-3">
                                                    {{ __('Tawk Chat Settings') }}
                                                </h2>
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Tawk Chat URL (s1.src)') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            {{ __('https://embed.tawk.to/') }}
                                                        </span>
                                                        <input type="text" class="form-control" name="tawk_chat_bot_key"
                                                            value="{{ $settings->tawk_chat_key }}"
                                                            placeholder="{{ __('Tawk Chat Key') }}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Update button --}}
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Website Configuration Settings --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2" aria-expanded="false">
                                    <h2>{{ __('Website Configuration Settings') }}</h2>
                                </button>
                            </h2>
                            <div id="collapse-2" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <form action="{{ route('admin.change.website.settings') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            {{-- Theme Colors --}}
                                            <div class="col-md-12 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Theme Colors') }}</label>
                                                    <div class="row g-2">

                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="app_theme" type="radio" value="blue"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'blue' ? 'checked' : ''
                                                                }}
                                                                />
                                                                <span class="form-colorinput-color bg-blue"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input name="app_theme" type="radio" value="indigo"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'indigo' ? 'checked' :
                                                                ''
                                                                }} />
                                                                <span class="form-colorinput-color bg-indigo"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="app_theme" type="radio" value="green"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'green' ? 'checked' :
                                                                '' }}
                                                                />
                                                                <span class="form-colorinput-color bg-green"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="app_theme" type="radio" value="yellow"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'yellow' ? 'checked' :
                                                                ''
                                                                }} />
                                                                <span class="form-colorinput-color bg-yellow"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="app_theme" type="radio" value="red"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'red' ? 'checked' : ''
                                                                }}
                                                                />
                                                                <span class="form-colorinput-color bg-red"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="app_theme" type="radio" value="purple"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'purple' ? 'checked' :
                                                                ''
                                                                }} />
                                                                <span class="form-colorinput-color bg-purple"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="app_theme" type="radio" value="pink"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'pink' ? 'checked' : ''
                                                                }}
                                                                />
                                                                <span class="form-colorinput-color bg-pink"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input name="app_theme" type="radio" value="gray"
                                                                    class="form-colorinput-input" {{
                                                                    $config[11]->config_value == 'gray' ? 'checked' : ''
                                                                }}
                                                                />
                                                                <span class="form-colorinput-color bg-muted"></span>
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Home Banner Image --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Banner Image') }} <span
                                                            class="text-muted">
                                                            ({{ __('Recommended size : 1000 x 667') }})</span></div>
                                                    <input type="file" class="form-control" name="primary_image"
                                                        placeholder="{{ __('Banner Image') }}"
                                                        accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                </div>
                                            </div>

                                            {{-- Website Logo --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Website Logo') }} <span
                                                            class="text-muted">
                                                            ({{ __('Recommended size : 200 x 90') }})</span></div>
                                                    <input type="file" class="form-control" name="site_logo"
                                                        placeholder="{{ __('Website Logo') }}"
                                                        accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                </div>
                                            </div>

                                            {{-- Favicon --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Favicon') }} <span
                                                            class="text-muted">
                                                            ({{ __('Recommended size : 200 x 200') }})</span></div>
                                                    <input type="file" class="form-control" name="favi_icon"
                                                        placeholder="{{ __('Favicon') }}"
                                                        accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                </div>
                                            </div>

                                            {{-- App Name --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('App Name') }}</label>
                                                    <input type="text" class="form-control" name="app_name"
                                                        value="{{ config('app.name') }}"
                                                        placeholder="{{ __('App Name') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Site Name --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Site Name') }}</label>
                                                    <input type="text" class="form-control" name="site_name"
                                                        value="{{ $settings->site_name }}"
                                                        placeholder="{{ __('Site Name') }}" required>
                                                </div>
                                            </div>

                                            {{-- Update button --}}
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Update Payments Settings --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-3" aria-expanded="false">
                                    <h2>{{ __('Payment Methods Configuration Settings') }}</h2>
                                </button>
                            </h2>
                            <div id="collapse-3" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <form action="{{ route('admin.change.payments.settings') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            {{-- Paypal Settings --}}
                                            <h2 class="page-title my-3">
                                                {{ __('Paypal Settings') }}
                                            </h2>
                                            {{-- Mode --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Mode' )}}</label>
                                                    <select type="text" class="form-select"
                                                        placeholder="Select a payment mode" id="select-tags-advanced"
                                                        name="paypal_mode" required>
                                                        <option value="sandbox" {{ $config[3]->config_value == 'sandbox'
                                                            ?
                                                            'selected' : '' }}>
                                                            {{ __('Sandbox') }}</option>
                                                        <option value="live" {{ $config[3]->config_value == 'live' ?
                                                            'selected' : '' }}>
                                                            {{ __('Live') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Client Key --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Client Key') }}</label>
                                                    <input type="text" class="form-control" name="paypal_client_key"
                                                        value="{{ $config[4]->config_value }}"
                                                        placeholder="{{ __('Client Key') }}" required>
                                                </div>
                                            </div>

                                            {{-- Secret --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label" required>{{ __('Secret') }}</label>
                                                    <input type="text" class="form-control" name="paypal_secret"
                                                        value="{{ $config[5]->config_value }}"
                                                        placeholder="{{ __('Secret') }}" required>
                                                </div>
                                            </div>

                                            {{-- Razorpay Settings --}}
                                            <h2 class="page-title my-3">
                                                {{ __('Razorpay Settings') }}
                                            </h2>
                                            {{-- Client Key --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Client Key') }}</label>
                                                    <input type="text" class="form-control" name="razorpay_client_key"
                                                        value="{{ $config[6]->config_value }}"
                                                        placeholder="{{ __('Client Key') }}" required>
                                                </div>
                                            </div>

                                            {{-- Secret --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Secret') }}</label>
                                                    <input type="text" class="form-control" name="razorpay_secret"
                                                        value="{{ $config[7]->config_value }}"
                                                        placeholder="{{ __('Secret') }}" required>
                                                </div>
                                            </div>

                                            {{-- Stripe Settings --}}
                                            <h2 class="page-title my-3">
                                                {{ __('Stripe Settings') }}
                                            </h2>
                                            {{-- Publishable Key --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Publishable Key')
                                                        }}</label>
                                                    <input type="text" class="form-control"
                                                        name="stripe_publishable_key"
                                                        value="{{ $config[9]->config_value }}"
                                                        placeholder="{{ __('Publishable Key') }}" required>
                                                </div>
                                            </div>

                                            {{-- Secret --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Secret Key') }}</label>
                                                    <input type="text" class="form-control" name="stripe_secret"
                                                        value="{{ $config[10]->config_value }}"
                                                        placeholder="{{ __('Secret Key') }}" required>
                                                </div>
                                            </div>

                                            {{-- Paystack Settings --}}
                                            <h2 class="page-title my-3">
                                                {{ __('Paystack Settings') }}
                                            </h2>
                                            {{-- Publishable Key --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Public Key')
                                                        }}</label>
                                                    <input type="text" class="form-control"
                                                        name="paystack_public_key"
                                                        value="{{ $config[37]->config_value }}"
                                                        placeholder="{{ __('Public Key') }}" required>
                                                </div>
                                            </div>

                                            {{-- Secret --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Secret Key') }}</label>
                                                    <input type="text" class="form-control" name="paystack_secret"
                                                        value="{{ $config[38]->config_value }}"
                                                        placeholder="{{ __('Secret Key') }}" required>
                                                </div>
                                            </div>

                                            {{-- Merchant Email --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Merchant Email') }}</label>
                                                    <input type="text" class="form-control" name="merchant_email"
                                                        value="{{ $config[40]->config_value }}"
                                                        placeholder="{{ __('Merchant Email') }}" required>
                                                </div>
                                            </div>

                                             {{-- Mollie Settings --}}
                                             <h2 class="page-title my-3">
                                                {{ __('Mollie Settings') }}
                                            </h2>
                                            {{-- Key --}}
                                            <div class="col-md-8 col-xl-8">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Key')
                                                        }}</label>
                                                    <input type="text" class="form-control"
                                                        name="mollie_key"
                                                        value="{{ $config[41]->config_value }}"
                                                        placeholder="{{ __('Key') }}" required>
                                                </div>
                                            </div>

                                            {{-- Offline (Bank Transfer) Settings --}}
                                            <div class="col-md-8 col-xl-8 mt-3">
                                                <h2 class="page-title my-3">
                                                    {{ __('Offline (Bank Transfer) Settings') }}
                                                </h2>
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Offline (Bank Transfer)
                                                        Details')
                                                        }}</label>
                                                    <textarea class="form-control" name="bank_transfer" rows="3"
                                                        placeholder="{{ __('Offline (Bank Transfer) Details') }}"
                                                        required>{{ $config[31]->config_value }}</textarea>
                                                </div>
                                            </div>

                                            {{-- Update button --}}
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Update Google Settings --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-4" aria-expanded="false">
                                    <h2>{{ __('Google Configuration Settings') }}</h2>
                                </button>
                            </h2>
                            <div id="collapse-4" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <form action="{{ route('admin.change.google.settings') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            {{-- Google reCAPTCHA Settings --}}
                                            <h2 class="page-title my-3">
                                                {{ __('Google reCAPTCHA Configuration Settings') }}
                                            </h2>
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('reCAPTCHA Enable') }}</div>
                                                    <select class="form-select" placeholder="Select a reCAPTCHA"
                                                        id="recaptcha_enable" name="recaptcha_enable" disabled="">
                                                        <option value="on" {{ $settings->
                                                            recaptcha_configuration['RECAPTCHA_ENABLE'] == 'on' ?
                                                            'checked' : '' }}>
                                                            {{ __('On') }}</option>
                                                        <option value="off" {{ $settings->
                                                            recaptcha_configuration['RECAPTCHA_ENABLE'] == 'off' ?
                                                            'checked' : '' }}>
                                                            {{ __('Off') }}</option>
                                                    </select>
                                                </div>
                                                <span>{{ __('If you did not get a reCAPTCHA (v2 Checkbox), create a') }}
                                                    <a href="https://www.google.com/recaptcha/about/" target="_blank">{{
                                                        __('reCAPTCHA') }}</a> </span>
                                            </div>

                                            {{-- reCAPTCHA Site Key --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('reCAPTCHA Site Key') }}</label>
                                                    <input type="text" class="form-control" name="recaptcha_site_key"
                                                        value="{{ $settings->recaptcha_configuration['RECAPTCHA_SITE_KEY'] }}"
                                                        placeholder="{{ __('reCAPTCHA Site Key') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- reCAPTCHA Secret Key --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('reCAPTCHA Secret Key') }}</label>
                                                    <input type="text" class="form-control" name="recaptcha_secret_key"
                                                        value="{{ $settings->recaptcha_configuration['RECAPTCHA_SECRET_KEY'] }}"
                                                        placeholder="{{ __('reCAPTCHA Secret Key') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Google OAuth Settings --}}
                                            <h2 class="page-title my-4">
                                                {{ __('Google OAuth Configuration Settings') }}
                                            </h2>
                                            {{-- Google Auth Enable --}}
                                            <div class="col-md-3 col-xl-3">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Google Auth Enable') }}</div>
                                                    <select class="form-select" placeholder="Select a reCAPTCHA"
                                                        id="google_auth_enable" name="google_auth_enable" disabled="">
                                                        <option value="on" {{ $settings->
                                                            google_configuration['GOOGLE_ENABLE'] == 'on' ? 'checked' :
                                                            '' }}>
                                                            {{ __('On') }}</option>
                                                        <option value="off" {{ $settings->
                                                            google_configuration['GOOGLE_ENABLE'] == 'off' ? 'checked' :
                                                            '' }}>
                                                            {{ __('Off') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Google Client ID --}}
                                            <div class="col-md-3 col-xl-3">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Google Client ID') }}</label>
                                                    <input type="text" class="form-control" name="google_client_id"
                                                        value="{{ $settings->google_configuration['GOOGLE_CLIENT_ID'] }}"
                                                        placeholder="{{ __('Google CLIENT ID') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Google Client Secret --}}
                                            <div class="col-md-3 col-xl-3">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Google Client Secret') }}</label>
                                                    <input type="text" class="form-control" name="google_client_secret"
                                                        value="{{ $settings->google_configuration['GOOGLE_CLIENT_SECRET'] }}"
                                                        placeholder="{{ __('Google CLIENT Secret') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Google Redirect --}}
                                            <div class="col-md-3 col-xl-3">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Google Redirect') }}</label>
                                                    <input type="text" class="form-control" name="google_redirect"
                                                        value="{{ $settings->google_configuration['GOOGLE_REDIRECT'] }}"
                                                        placeholder="{{ __('Google Redirect') }}" readonly>
                                                </div>
                                            </div>
                                            <span>{{ __('If you did not get a google OAuth Client ID & Secret Key, follow a') }} <a
                                                    href="https://support.google.com/cloud/answer/6158849?hl=en#zippy=%2Cuser-consent%2Cpublic-and-internal-applications%2Cauthorized-domains/"
                                                    target="_blank">{{ __(' steps') }}</a> </span>

                                            {{-- Google Analytics ID --}}
                                            <div class="col-md-6 col-xl-6 mt-3">
                                                <h2 class="page-title my-3">
                                                    {{ __('Google Analytics Configuration Settings') }}
                                                </h2>
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Google Analytics ID')
                                                        }}</label>
                                                    <input type="text" class="form-control" name="google_analytics_id"
                                                        value="{{ $settings->analytics_id }}"
                                                        placeholder="{{ __('Google Analytics ID') }}" required>
                                                </div>
                                                <span>{{ __('If you did not get a google analytics id, create a') }} <a
                                                        href="https://analytics.google.com/analytics/web/"
                                                        target="_blank">{{
                                                        __('new analytics id.') }}</a> </span>
                                            </div>

                                            {{-- Google AdSense --}}
                                            <div class="col-md-12 col-xl-12 mt-3">
                                                <h2 class="page-title my-3">
                                                    {{ __('Google AdSense Configuration Settings') }}
                                                </h2>
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Google AdSense code')
                                                        }}</label>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            {{ __('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=') }}
                                                        </span>
                                                        <input type="text" class="form-control " name="adsense_code" value="{{ $settings->adsense_code }}" placeholder="{{ __('Google AdSense code') }}" autocomplete="off">
                                                    </div>
                                                    <small>{{ __("Note") }} :</small><br>
                                                    <small>{{ __("Enter your AdSense code for enable AdSense") }}</small><br>
                                                    <small>{{ __("Type DISABLE for disable AdSense") }}</small><br>
                                                </div>
                                                <span>{{ __('If you did not get a google adsense code, create a') }} <a
                                                        href="https://www.google.com/adsense/new"
                                                        target="_blank">{{
                                                        __('new adsense code.') }}</a> </span>
                                            </div>

                                            {{-- Update button --}}
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Update Email Configuration Settings --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-5" aria-expanded="false">
                                    <h2>{{ __('Email Configuration Settings') }}</h2>
                                </button>
                            </h2>
                            <div id="collapse-5" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <form action="{{ route('admin.change.email.settings') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            {{-- Sender Name --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Sender Name') }}</label>
                                                    <input type="text" class="form-control" name="mail_sender"
                                                        value="{{ $settings->email_configuration['name'] }}"
                                                        placeholder="{{ __('Sender Name') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Sender Email Address --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Sender Email Address') }}</label>
                                                    <input type="text" class="form-control" name="mail_address"
                                                        value="{{ $settings->email_configuration['address'] }}"
                                                        placeholder="{{ __('Sender Email Address') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Mailer Driver --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Mailer Driver') }}</label>
                                                    <input type="text" class="form-control" name="mail_driver"
                                                        value="{{ $settings->email_configuration['driver'] }}"
                                                        placeholder="{{ __('Mailer Driver') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Mailer Host --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Mailer Host') }}</label>
                                                    <input type="text" class="form-control" name="mail_host"
                                                        value="{{ $settings->email_configuration['host'] }}"
                                                        placeholder="{{ __('Mailer Host') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Mailer Port --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Mailer Port') }}</label>
                                                    <input type="text" class="form-control" name="mail_port"
                                                        value="{{ $settings->email_configuration['port'] }}"
                                                        placeholder="{{ __('Mailer Port') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Mailer Encryption --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Mailer Encryption') }}</label>
                                                    <input type="text" class="form-control" name="mail_encryption"
                                                        value="{{ $settings->email_configuration['encryption'] }}"
                                                        placeholder="{{ __('Mailer Encryption') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Mailer Username --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Mailer Username') }}</label>
                                                    <input type="text" class="form-control" name="mail_username"
                                                        value="{{ $settings->email_configuration['username'] }}"
                                                        placeholder="{{ __('Mailer Username') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Mailer Password --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Mailer Password') }}</label>
                                                    <input type="password" class="form-control" name="mail_password"
                                                        value="{{ $settings->email_configuration['password'] }}"
                                                        placeholder="{{ __('Mailer Password') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Test Mail --}}
                                            <div class="col-md-4 col-xl-4 mt-3">
                                                <div class="mb-3">
                                                    <label class="form-label"></label>
                                                    <a href="{{ route('admin.test.email') }}" class="btn btn-primary">
                                                        {{ __('Test Mail') }}
                                                    </a>
                                                </div>
                                            </div>

                                            <span class="text-muted">{{ __('Note: You can change the respective values directly from .env file.') }} <a
                                                    href="https://aitoosdocs.goapps.co.in/" target="_blank">{{
                                                    __('How should I do?') }}</a></span>

                                            {{-- Update button --}}
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- AI Tools Configuration Settings --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-7" aria-expanded="false">
                                    <h2>{{ __('AI Tools Configuration Settings') }}</h2>
                                </button>
                            </h2>
                            <div id="collapse-7" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <form action="{{ route('admin.change.ai.settings') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            {{-- OpenAI Model --}}
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="ai_model">{{ __('Open AI Model')
                                                        }}</label>
                                                    <select name="ai_model" id="ai_model"
                                                        class="form-control" required>
                                                        <option value="gpt-3.5-turbo" {{ $config[34]->config_value == 'gpt-3.5-turbo' ? ' selected' : ''
                                                            }}>
                                                            {{ __('GPT 3.5 Turbo') }}</option>
                                                        <option value="text-davinci-003" {{ $config[34]->config_value == 'text-davinci-003' ? ' selected' : ''
                                                            }}>
                                                            {{ __('Text Davinci 003') }}</option>
                                                        <option value="text-davinci-002" {{ $config[34]->config_value == 'text-davinci-002' ? ' selected' : ''
                                                            }}>
                                                            {{ __('Text Davinci 002') }}</option>
                                                        <option value="text-ada-001" {{ $config[34]->config_value == 'text-ada-001' ? ' selected' : ''
                                                            }}>
                                                            {{ __('Text Ada 001') }}</option>
                                                    </select>
                                                    <span>{{ __('To find out which model is right for you with OpenAI pricing,') }} <a
                                                        href="https://openai.com/pricing" rel="nofollow"
                                                        target="_blank">{{
                                                        __('click here') }}</a> </span>
                                                </div>
                                            </div>

                                            {{-- OpenAI API Key --}}
                                            <div class="col-md-6 col-xl-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="openai_api_key">{{ __('OpenAI API Key')
                                                        }}
                                                    </label>
                                                    <input type="text" class="form-control" name="openai_api_key"
                                                        value="{{ $config[35]->config_value }}"
                                                        placeholder="{{ __('OpenAI API Key (Eg: sk-****************)') }}"
                                                        required>
                                                    <span>{{ __('If you did not get a OpenAI API Key, create a') }} <a
                                                        href="https://platform.openai.com/account/api-keys" rel="nofollow"
                                                        target="_blank">{{
                                                        __('new API Key.') }}</a> </span>
                                                </div>
                                            </div>

                                            {{-- Maximum Words Length --}}
                                            <div class="col-md-6 col-xl-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="word_length">{{ __('Maximum Words Length')
                                                        }}
                                                    </label>
                                                    <input type="number" class="form-control" name="word_length" min="1"
                                                        value="{{ $config[30]->config_value }}"
                                                        placeholder="{{ __('Maximum Words Length (Eg: 1200)') }}"
                                                        required>
                                                </div>
                                            </div>

                                            {{-- Maximum Images Options --}}
                                            <div class="col-md-6 col-xl-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="image_length">{{ __('Maximum Images Options')
                                                        }}
                                                    </label>
                                                    <input type="number" class="form-control" name="image_length" min="1"
                                                        value="{{ $config[42]->config_value }}"
                                                        placeholder="{{ __('Maximum Images Options (Eg: 3)') }}"
                                                        required>
                                                </div>
                                            </div>
 
                                            <h2 class="page-title my-4">
                                                {{ __('Tiny Cloud (Text Editor) Configuration Settings') }}
                                            </h2>

                                            {{-- Tiny Cloud API Key --}}
                                            <div class="col-md-12 col-xl-12 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label required" for="tiny_api_key">{{ __('Tiny Cloud API Key') }}
                                                    </label>
                                                    <input type="text" class="form-control" name="tiny_api_key"
                                                        value="{{ $config[36]->config_value }}"
                                                        placeholder="{{ __('Tiny Cloud API Key (Eg: ytf5**************************)') }}"
                                                        required>
                                                    <span>{{ __('If you did not get a Tiny Cloud API Key, create a') }} <a
                                                        href="https://www.tiny.cloud/my-account/dashboard" rel="nofollow"
                                                        target="_blank">{{
                                                        __('new API Key.') }}</a> </span>
                                                </div>
                                            </div>

                                            {{-- Update button --}}
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                        {{ __('Update') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- AWS S3 Configuration Settings --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-7" aria-expanded="false">
                                    <h2>{{ __('AWS S3 Configuration Settings') }}</h2>
                                </button>
                            </h2>
                            <div id="collapse-7" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-example">
                                <div class="accordion-body pt-0">
                                    <form action="{{ route('admin.change.aws.s3.settings') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            {{-- Enable AWS? --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="aws_enable">{{ __('AWS')
                                                        }}</label>
                                                    <select name="aws_enable" id="aws_enable"
                                                        class="form-control">
                                                        <option value="on" {{ env('AWS_ENABLE')=='on' ? ' selected' : ''
                                                            }}>
                                                            {{ __('Enable') }}</option>
                                                        <option value="off" {{ env('AWS_ENABLE')=='off' ? ' selected'
                                                            : '' }}>
                                                            {{ __('Disable') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Access Key ID --}}
                                            <div class="col-md-4 col-xl-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image_limit">{{ __('Access Key ID')
                                                        }}
                                                    </label>
                                                    <input type="text" class="form-control" name="access_key"
                                                        value="{{ env('AWS_ACCESS_KEY_ID') }}"
                                                        placeholder="{{ __('Access Key ID (Eg: AKI****************)') }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            {{-- Secret Access Key --}}
                                            <div class="col-md-4 col-xl-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image_limit">{{ __('Secret Access
                                                        Key') }}
                                                    </label>
                                                    <input type="text" class="form-control" name="secret_key"
                                                        value="{{ env('AWS_SECRET_ACCESS_KEY') }}"
                                                        placeholder="{{ __('Secret Access Key (Eg: RYaA********/E****************)') }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            {{-- Default Region --}}
                                            <div class="col-md-4 col-xl-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image_limit">{{ __('Access Region')
                                                        }}
                                                    </label>
                                                    <input type="text" class="form-control" name="default_region"
                                                        value="{{ env('AWS_DEFAULT_REGION') }}"
                                                        placeholder="{{ __('Default Region (Eg: ap-east-1)') }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            {{-- Bucket --}}
                                            <div class="col-md-4 col-xl-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image_limit">{{ __('Bucket') }}
                                                    </label>
                                                    <input type="text" class="form-control" name="bucket"
                                                        value="{{ env('AWS_BUCKET') }}"
                                                        placeholder="{{ __('Bucket (Eg: ap-east-1)') }}" readonly>
                                                </div>
                                            </div>

                                            {{-- Use Path Style Endpoint --}}
                                            <div class="col-md-4 col-xl-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="aws_path_enable">{{ __('Use Path Style Endpoint') }}</label>
                                                    <select name="end_point" id="end_point" class="form-control"
                                                        readonly>
                                                        <option value="true" {{ env('AWS_USE_PATH_STYLE_ENDPOINT')==true
                                                            ? ' selected' : '' }} disabled>
                                                            {{ __('true') }}</option>
                                                        <option value="false" {{
                                                            env('AWS_USE_PATH_STYLE_ENDPOINT')==false ? ' selected' : ''
                                                            }} disabled>
                                                            {{ __('false') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <span class="text-muted">{{ __('Note: You can change the respective values directly from .env file.') }} <a
                                                    href="https://aitoolsdocs.goapps.co.in/" target="_blank">{{
                                                    __('How should I do?') }}</a></span>

                                            {{-- Update button --}}
                                            <div class="text-end">
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                        {{ __('Update') }}
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
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('admin.includes.footer')
</div>

{{-- Custom JS --}}
@section('custom-js')
<script src="{{ asset('js/tom-select.base.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        "use strict";
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('currency'), {
    		copyClassesToDropdown: false,
    		dropdownClass: 'dropdown-menu ts-dropdown',
    		optionClass:'dropdown-item',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    		},
    	}));
    });
</script>
@endsection
@endsection