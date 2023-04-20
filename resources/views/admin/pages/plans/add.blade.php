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
                        {{ __('Add Plan') }}
                    </h2>
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
                {{-- Save Plan --}}
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.save.plan') }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="page-title">{{ __('Plan Details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">

                                        {{-- Recommended --}}
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Recommended') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="recommended">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Private Plan --}}
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Private Plan') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_private">
                                                </label>
                                                <small class="text-muted">{{ __('This plan does not show on the customer page. Only the admin panel can assign this plan to the customer.') }} </small>
                                            </div>
                                        </div>

                                        {{-- Plan Name --}}
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Plan Name') }}</label>
                                                <input type="text" class="form-control text-capitalize" name="name"
                                                    placeholder="{{ __('Plan Name') }}" required>
                                            </div>
                                        </div>
                                        {{-- Plan Description --}}
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Description') }}</label>
                                                <textarea class="form-control text-capitalize" name="description" rows="3"
                                                    placeholder="{{ __('Description') }}.." required></textarea>

                                            </div>
                                        </div>

                                        {{-- Plan Prices --}}
                                        <h2 class="page-title my-3">
                                            {{ __('Plan Prices') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Price') }}</label>
                                                <input type="number" class="form-control" name="price" min="0"
                                                    step="0.01" placeholder="{{ __('Price') }}" required>
                                                <small class="text-muted">{{ __('Set 0 for "Free"')}} </small>
                                            </div>
                                        </div>

                                        {{-- Plan Validity --}}
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Validity') }}</label>
                                                <input type="number" class="form-control" name="validity" min="1"
                                                    max="9999" placeholder="{{ __('Validity') }}"
                                                    value="{{ $config[8]->config_value == 'monthly' ? 31 : 365 }}"
                                                    required>
                                                <small class="text-muted">{{ __("Set 31 for 'Month', Set 365 for 'Year', Set 9999 for 'Forever'")}} </small>
                                            </div>
                                        </div>

                                        {{-- Templates --}}
                                        <h2 class="page-title my-3">
                                            {{ __('Templates') }}
                                        </h2>

                                        {{-- Blog Outline --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Blog Outline') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="blog_outline">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Blog Headline --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Blog Headline') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="blog_headline">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Blog Description --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Blog Description') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="blog_description">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Blog Story Ideas --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Blog Story Ideas') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="blog_story_ideas">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Article Content --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Article Content') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="article_content">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Paragraph --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Paragraph') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="paragraph">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Summarization --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Summarization') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="summarization">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Product Name --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Product Name') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="product_name">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Product Description --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Product Description') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="product_description">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Startup Name --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Startup Name') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="startup_name">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Service Review --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Service Review') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="service_review">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- YouTube Video Titles --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('YouTube Video Titles') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="youtube_video_titles">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- YouTube Video Tags --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('YouTube Video Tags') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="youtube_video_tags">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- YouTube Video Outline --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('YouTube Video Outline') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="youtube_video_outline">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- YouTube Video Intro --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('YouTube Video Intro') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="youtube_video_intro">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- YouTube Video Ideas --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('YouTube Video Ideas') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="youtube_video_ideas">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- YouTube Short Script --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('YouTube Short Script') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="youtube_short_script">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Write for me --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Write for me') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="write_for_me">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Website Meta Description --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Website Meta Description') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="website_meta_description">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Website Meta Keywords --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Website Meta Keywords') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="website_meta_keywords">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Website Meta Title --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Website Meta Title') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="website_meta_title">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Event Promotion Email --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Event Promotion Email') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="event_promotion_email">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Twitter Writer --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Twitter Writer') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="twitter_writer">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- AI Presentation Content --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('AI Presentation Content') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="presentation_content">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Ask a Question --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Ask a Question') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="ask_question">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Landing Page --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Landing Page') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="landing_page">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Google Ads --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Google Ads') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="google_ads">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- AIDA framework --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('AIDA framework') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()" name="aida">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Product Review --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Product Review') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="product_review">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Welcome Email --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Welcome Email') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="welcome_email">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- YouTube Video Description --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('YouTube Video Description') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="youtube_video_description">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Custom Prompt --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Custom Prompt') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="custom_prompt">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Generator by Website URL --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Generate by Website URL') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input availableTemplates" type="checkbox" onclick="checkTotalCheckedTemplates()"
                                                        name="generate_by_website_url">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Features --}}
                                        <h2 class="page-title my-3">
                                            {{ __('Features') }}
                                        </h2>

                                        {{-- Templates --}}
                                        <div class="col-md-6 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Templates') }} <span
                                                        class="text-muted"></label>
                                                <input type="number" class="form-control totalTemplates" name="templates" min="1" readonly
                                                    placeholder="{{ __('Templates') }}" required>
                                            </div>
                                        </div>

                                        {{-- Words Per Month --}}
                                        <div class="col-md-6 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Words Per Month') }}</label>
                                                <input type="number" class="form-control" name="words" min="1"
                                                    placeholder="{{ __('Eg: 3000') }}" required>
                                            </div>
                                        </div>

                                        {{-- Images Per Month --}}
                                        <div class="col-md-6 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Images Per Month') }}</label>
                                                <input type="number" class="form-control" name="images" min="1"
                                                    placeholder="{{ __('Eg: 100') }}" required>
                                            </div>
                                        </div>

                                        {{-- AI Speech to Text --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('AI Speech to Text') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ai_speech_to_text">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- AI Code --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('AI Code') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ai_code">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Additional Features --}}
                                        <h2 class="page-title my-3">
                                            {{ __('Additional') }}
                                        </h2>

                                        {{-- Additional Tools --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Additional Tools') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="additional_tools">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Support --}}
                                        <div class="col-md-3 col-xl-3">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Support') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="support">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <div class="d-flex">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                    {{ __('Add') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('admin.includes.footer')
</div>

{{-- Custom JS --}}
@section('custom-js')
<script>
function checkTotalCheckedTemplates(){
    "use strict";
    var templates = $('.availableTemplates:checked').length;
    $(".totalTemplates").val(null);
    if (templates != 0) {
        $(".totalTemplates").val(templates);
    }
}
</script>
@endsection
@endsection