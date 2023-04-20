@php
// Settings
use App\Models\Config;
use App\Models\Page;
$config = Config::get();
$page = Page::where('slug', 'home')->where('status', 1)->get();
@endphp

{!! trans($page[0]->body) !!}

{{-- Custom JS --}}
@section('custom-js')
@endsection