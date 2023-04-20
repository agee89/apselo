@extends('layouts.guest')

@section('content')

{{-- Custom JS --}}
@section('custom-css')
{{-- AdSense status --}}
@if ($setting->adsense_code != "DISABLE")
@if ($setting->adsense_code != "")
{{-- AdSense code --}}
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $setting->adsense_code }}"
    crossorigin="anonymous"></script>
@endif
@endif
@endsection

{{-- Topbar --}}
@include('website.includes.topbar')

@php
use App\Models\Page;
$page = Page::where('slug', 'refund-policy')->where('status', 1)->get();
@endphp

{{-- Refund Policy --}}
{!! __($page[0]->body) !!}

{{-- Footer --}}
@include('website.includes.footer')
@endsection