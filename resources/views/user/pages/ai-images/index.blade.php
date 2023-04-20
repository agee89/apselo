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
                        {{ __('Recently Generated Images') }}
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
                {{-- New Image --}}
                <div class="col-md-6 col-lg-4">
                    <div class="card border border-muted rounded">
                        <a href="{{ route('user.new.ai.image') }}" class="text-muted">
                            <div class="card-body text-center p-5" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="{{ __('New Image') }}">
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
                {{-- Generated Images --}}
                @foreach ($images as $image)
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <a data-fslightbox="gallery"
                                        href="data:image/png;base64,{{ json_decode($image->result)[0]->b64_json }}">
                                        <img src="data:image/png;base64,{{ json_decode($image->result)[0]->b64_json }}"
                                            alt="{{ $image->name }}" class="rounded">
                                    </a>
                                </div>
                                <div class="col">
                                    <span class="badge bg-red text-capitalize">{{ str_replace('-', ' ',
                                        $image->type)
                                        }}</span>
                                    <h3 class="card-title text-uppercase my-1">{{ mb_strimwidth($image->name, 0, 15,
                                        "...")
                                        }}</h3>
                                    <div class="text-muted">
                                        {{-- Image Count --}}
                                        {{ __('Image Count') }} : <span class="text-muted"><strong>{{ $image->n
                                                }}</strong></span> <br>
                                        {{-- Size --}}
                                        {{ __('Size') }} : <span class="text-muted"><strong>{{ $image->size
                                                }}</strong></span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    {{-- Actions --}}
                                    <div class="dropdown">
                                        <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="right"
                                                title="{{ __('View') }}"
                                                href="{{ route('user.view.ai.image', $image->generate_id) }}">{{
                                                __('View')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- Generated at --}}
                            <strong>{{ __('Generated at') }}: <span class="text-primary">{{
                                    $image->updated_at->diffForHumans()
                                    }}</span></strong>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 mt-5">
                    {{-- Pagination --}}
                    {{ $images->links() }}
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('user.includes.footer')
    </div>
</div>

{{-- Delete content Modal --}}
<div class="modal modal-blur fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">{{ __('Are you sure?')}}</div>
                <div id="deleteStatus"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">{{
                    __('Cancel')}}</button>
                <a class="btn btn-danger" id="deleteImageId">{{ __('Yes, proceed')}}</a>
            </div>
        </div>
    </div>
</div>

{{-- Custom JS --}}
@section('custom-js')
<script type="text/javascript" src="{{ asset('js/lightgallery.min.js') }}">
    <script>
    // Delete image
    function deleteImage(deleteImageId, deleteImageStatus) {
    "use strict";
    $("#delete-modal").modal("show");
    var deleteStatus = document.getElementById("deleteStatus");
    deleteStatus.innerHTML = "
    <?php echo __('If you proceed, you will') ?> " + deleteImageStatus + "
    <?php echo __('this image.') ?>"
    var delete_link = document.getElementById("deleteImageId");
    delete_link.getAttribute("href");
    delete_link.setAttribute("href", "{{ route('user.delete.ai.image') }}?id=" + deleteImageId);
    }
</script>
@endsection
@endsection