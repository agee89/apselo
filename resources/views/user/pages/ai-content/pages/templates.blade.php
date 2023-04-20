@extends('user.layouts.app')

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
                        {{ __('Templates') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">
            <div class="row row-cards">
                {{-- Blog Headline --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->blog_headline == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->blog_headline == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->blog_headline == 1 ? route('user.ai.blog.content') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Blog Headline')}}</h3>
                                <p class="text-muted">{{ __('Maintaining a blog is a proven way to drive traffic to your website through SEO.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Blog Description --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->blog_description == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->blog_description == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->blog_description == 1 ? route('user.ai.blog.description') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Blog Description')}}</h3>
                                <p class="text-muted">{{ __('Generate description ideas for your articles and blog posts.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Blog Story Ideas --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->blog_story_ideas == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->blog_story_ideas == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->blog_story_ideas == 1 ? route('user.ai.blog.story.ideas') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Blog Story Ideas') }}</h3>
                                <p class="text-muted">{{ __('A great tool to create blog stories that people love the most.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Article Content Creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->article_content == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->article_content == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->article_content == 1 ? route('user.ai.content.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Article Content') }}</h3>
                                <p class="text-muted">{{ __('Create appealing and awe-inspiring content for the viewers.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Paragraph Creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->paragraph == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->paragraph == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->paragraph == 1 ? route('user.ai.paragraph.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Paragraph') }}</h3>
                                <p class="text-muted">{{ __('You can use any one-word keywords to create an engaging paragraph.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Summarization creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->summarization == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->summarization == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->summarization == 1 ? route('user.ai.summarization.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Summarization') }}</h3>
                                <p class="text-muted">{{ __('Tool that represents the most important information from original content.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Product Name Creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->product_name == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->product_name == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->product_name == 1 ? route('user.ai.product.name.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Product Name') }}</h3>
                                <p class="text-muted">{{ __('Generate short, catchy names with a state of the art language model') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Product Description Creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->product_description == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->product_description == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->product_description == 1 ? route('user.ai.product.description.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Product Description')}}</h3>
                                <p class="text-muted">{{ __('That enables you to create beautiful and effective product descriptions that sell.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Startup Name Creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->startup_name == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->startup_name == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->startup_name == 1 ? route('user.ai.startup.name.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Startup Name')}}</h3>
                                <p class="text-muted">{{ __('Generate a short, brandable business / startup name using artificial intelligence') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Service Review Creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->service_review == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->service_review == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->service_review == 1 ? route('user.ai.service.review.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Service Review')}}</h3>
                                <p class="text-muted">{{ __('Write Service Reviews based on the provider name and service name') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- YouTube Video Titles --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->youtube_video_titles == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->youtube_video_titles == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->youtube_video_titles == 1 ? route('user.ai.youtube.title.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('YouTube Video Titles')}}</h3>
                                <p class="text-muted">{{ __('Write YouTube video titles that will attract viewers.') }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- YouTube Video Tags --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->youtube_video_tags == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->youtube_video_tags == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->youtube_video_tags == 1 ? route('user.ai.youtube.tags.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('YouTube Video Tags')}}</h3>
                                <p class="text-muted">{{ __('Tell us about the amazing ones in the video') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- YouTube Video Outline --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->youtube_video_outline == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->youtube_video_outline == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->youtube_video_outline == 1 ? route('user.ai.youtube.outline.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('YouTube Video Outline')}}</h3>
                                <p class="text-muted">{{ __('Generate youtube video outline from a video title') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- YouTube Video Intro --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->youtube_video_intro == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->youtube_video_intro == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->youtube_video_intro == 1 ? route('user.ai.youtube.intro.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('YouTube Video Intro')}}</h3>
                                <p class="text-muted">{{ __('Write interesting intro script for your youtube video') }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- YouTube Video Ideas --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->youtube_video_ideas == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->youtube_video_ideas == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->youtube_video_ideas == 1 ? route('user.ai.youtube.ideas.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('YouTube Video Ideas')}}</h3>
                                <p class="text-muted">{{ __('Create your video content with the help of AI') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- YouTube Short Script --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->youtube_short_script == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->youtube_short_script == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->youtube_short_script == 1 ? route('user.ai.youtube.shorts.script.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('YouTube Short Script') }}</h3>
                                <p class="text-muted">{{ __('Create the perfect script for your next viral Youtube Shorts.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Write for me --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->write_for_me == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->write_for_me == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->write_for_me == 1 ? route('user.ai.write.me.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Write for me')}}</h3>
                                <p class="text-muted">{{ __('Continue and complete my unfinished paragraph.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Website Meta Description --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->website_meta_description == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->website_meta_description == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->website_meta_description == 1 ? route('user.ai.website.meta.description.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Website Meta Description')}}</h3>
                                <p class="text-muted">{{ __('Write SEO friendly meta description for your website.') }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Website Meta Keywords --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->website_meta_keywords == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->website_meta_keywords == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->website_meta_keywords == 1 ? route('user.ai.website.meta.keywords.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Website Meta Keywords') }}</h3>
                                <p class="text-muted">{{ __('Write SEO friendly meta keywords for your website.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Website Meta Title --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->website_meta_title == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->website_meta_title == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->website_meta_title == 1 ? route('user.ai.website.meta.title.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Website Meta Title')}}</h3>
                                <p class="text-muted">{{ __('Write SEO friendly meta title for your website.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Event Promotion Email --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->event_promotion_email == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->event_promotion_email == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->event_promotion_email == 1 ? route('user.ai.event.promotion.email.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Event Promotion Email')}}</h3>
                                <p class="text-muted">{{ __('Write email to promote your event') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Twitter Writer --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->twitter_writer == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->twitter_writer == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->twitter_writer == 1 ? route('user.ai.twitter.writer.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Twitter Writer')}}</h3>
                                <p class="text-muted">{{ __('Write a tweet on the latest news') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Presentation Content --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->presentation_content == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->presentation_content == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->presentation_content == 1 ? route('user.ai.presentation.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('AI Presentation Content')}}</h3>
                                <p class="text-muted">{{ __('Write an engaging presentation content') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Ask a Question --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->ask_question == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->ask_question == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->ask_question == 1 ? route('user.ai.ask.question.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Ask a Question')}}</h3>
                                <p class="text-muted">{{ __('Get answer to all your questions') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Landing Page --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->landing_page == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->landing_page == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->landing_page == 1 ? route('user.ai.landing.page.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Landing Page')}}</h3>
                                <p class="text-muted mb-4">{{ __('Write hero text & description') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Google Ads --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->google_ads == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->google_ads == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->google_ads == 1 ? route('user.ai.google.ads.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Google Ads')}}</h3>
                                <p class="text-muted mb-3">{{ __('Generate Google Ads descriptions in within seconds')
                                    }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- AIDA framework --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->aida == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->aida == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->aida == 1 ? route('user.ai.aida.framework.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('AIDA framework')}}</h3>
                                <p class="text-muted mb-3">{{ __('The best-known marketing model for tracing the customer journey') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Product Review Creator --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->product_review == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->product_review == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->product_review == 1 ? route('user.ai.product.review.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Product Review')}}</h3>
                                <p class="text-muted">{{ __('Greatest approach to guarantee that you get and promote review of the highest caliber.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Welcome email --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->welcome_email == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->welcome_email == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->welcome_email == 1 ? route('user.ai.welcome.email.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Welcome Email')}}</h3>
                                <p class="text-muted">{{ __('Write personalized email to welcome the customer for oining your service / product.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- YouTube Video Description --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->youtube_video_description == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->youtube_video_description == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->youtube_video_description == 1 ? route('user.ai.youtube.description.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('YouTube Video Description')}}</h3>
                                <p class="text-muted">{{ __('Create your video content with the help of AI') }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Custom Prompt --}}
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        {{-- Check --}}
                        @if (json_decode($active_plan->templates)->custom_prompt == 1)
                        <div class="ribbon rounded bg-dark">
                            {{ __('New') }}
                        </div>
                        @else
                        <div class="ribbon rounded bg-red">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-crown"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                            </svg>
                        </div>
                        @endif
                        <a class="{{ json_decode($active_plan->templates)->custom_prompt == 1 ? '' : 'open-premium' }}"
                            href="{{ json_decode($active_plan->templates)->custom_prompt == 1 ? route('user.ai.custom.prompt.creator') : '#premiumModel' }}">
                            <div class="card-body">
                                <h3 class="card-title text-dark mt-4">{{ __('Custom Prompt')}}</h3>
                                <p class="text-muted">{{ __('Ask AI about anything that attracts others content') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('user.includes.footer')
</div>

{{-- Modal --}}
<div class="modal modal-blur fade" id="premiumModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler-crown text-danger" width="48" height="48"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"></path>
                </svg>
                <h3>{{ __('Premium Tool') }}</h3>
                <div class="text-muted">{{ __('This is a premium tool. If you want to access this tool, you need a premium plan.') }}</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn btn-dark w-100" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </a></div>
                        <div class="col"><a href="{{ route('user.plans') }}" class="btn btn-danger w-100">
                                {{ __('Go to plans') }}
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom JS --}}
@section('custom-js')
<script>
    // Modal
$(document).on("click", ".open-premium", function () {
    "use strict";
    $('#premiumModal').modal('show');
});
</script>
@endsection
@endsection