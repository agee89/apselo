@extends('layouts.guest')

@section('content')

{{-- Custom CSS --}}
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

@php
use App\Models\Page;
$page = Page::where('slug', 'tools')->where('status', 1)->get();
@endphp


{{-- Topbar --}}
@include('website.includes.topbar')

{{-- Tools --}}
<section class="py-24 md:pb-32 bg-white"
    style="background-image: url('flex-ui-assets/elements/pattern-white.svg'); background-position: center;">
    <div class="container px-4 mx-auto">
        {!! __($page[0]->body) !!}
        <div class="flex flex-wrap -mx-4" data-aos="fade-up" data-aos-delay="100">
            {{-- Tool 1 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Blog Outline') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Generate blog outline from a given topic') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.blog.outline') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 1 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Blog Headline') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Maintaining a blog is a proven way to drive traffic to website through SEO.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.blog.content') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 2 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Blog Description')}}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Generate description ideas for your articles and blog posts.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.blog.description') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 3 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Blog Story Ideas') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('A great tool to create blog stories that people love the most.') }}.</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.blog.story.ideas') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 4 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Article Content') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Create appealing and awe-inspiring content for the viewers.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.blog.story.ideas') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 5 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notes" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                            <path d="M9 7l6 0"></path>
                            <path d="M9 11l6 0"></path>
                            <path d="M9 15l4 0"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Paragraph') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('You can use any one-word keywords to create an engaging paragraph.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.paragraph.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 6 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notes" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                            <path d="M9 7l6 0"></path>
                            <path d="M9 11l6 0"></path>
                            <path d="M9 15l4 0"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Summarization') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Tool that represents most important information from original content.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.summarization.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 7 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Product Name') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Generate short, catchy names with a state of the art language model') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.product.name.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 8 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Product Description') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('That enables you to create beautiful & effective product descriptions that sell.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.product.description.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 9 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trademark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4.5 9h5m-2.5 0v6"></path>
                            <path d="M13 15v-6l3 4l3 -4v6"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Startup Name') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Generate brandable business / startup name using artificial intelligence') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.startup.name.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 10 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hotel-service" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8.5 10a1.5 1.5 0 0 1 -1.5 -1.5a5.5 5.5 0 0 1 11 0v10.5a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2c0 -1.38 .71 -2.444 1.88 -3.175l4.424 -2.765c1.055 -.66 1.696 -1.316 1.696 -2.56a2.5 2.5 0 1 0 -5 0a1.5 1.5 0 0 1 -1.5 1.5z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Service Review') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write Service Reviews based on the provider name and service name') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.service.review.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 11 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('YouTube Video Titles') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write YouTube video titles that will attract viewers.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.youtube.title.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 12 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('YouTube Video Tags') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Tell us about the amazing ones in the video') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.youtube.tags.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 13 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('YouTube Video Outline') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Generate youtube video outline from a video title') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.youtube.outline.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 14 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('YouTube Video Intro') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write interesting intro script for your youtube video') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.youtube.intro.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 15 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('YouTube Video Ideas') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Create your video content with the help of AI') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.youtube.ideas.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 16 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('YouTube Short Script') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Create the perfect script for your next viral Youtube Shorts.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.youtube.shorts.script.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 17 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z"></path>
                            <path d="M16 7h4"></path>
                            <path d="M18 19h-13a2 2 0 1 1 0 -4h4a2 2 0 1 0 0 -4h-3"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Write for me') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Continue and complete my unfinished paragraph.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.write.me.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 18 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-www" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4"></path>
                            <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4"></path>
                            <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4"></path>
                            <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4"></path>
                            <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4"></path>
                            <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4"></path>
                            <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Website Meta Description') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write SEO friendly meta description for your website.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.website.meta.description.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 19 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-www" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4"></path>
                            <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4"></path>
                            <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4"></path>
                            <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4"></path>
                            <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4"></path>
                            <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4"></path>
                            <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Website Meta Keywords') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write SEO friendly meta keywords for your website.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.website.meta.keywords.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 20 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-www" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4"></path>
                            <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4"></path>
                            <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4"></path>
                            <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4"></path>
                            <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4"></path>
                            <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4"></path>
                            <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Website Meta Title') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write SEO friendly meta title for your website.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.website.meta.title.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 21 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M15 5l0 2"></path>
                            <path d="M15 11l0 2"></path>
                            <path d="M15 17l0 2"></path>
                            <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Event Promotion Email') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write email to promote your event') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.event.promotion.email.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 22 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Twitter Writer') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write a tweet on the latest news') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.twitter.writer.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 23 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-presentation" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4l18 0"></path>
                            <path d="M4 4v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-10"></path>
                            <path d="M12 16l0 4"></path>
                            <path d="M9 20l6 0"></path>
                            <path d="M8 12l3 -3l2 2l3 -3"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('AI Presentation Content') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write an engaging presentation content') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.presentation.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 24 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-question-mark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4"></path>
                            <path d="M12 19l0 .01"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Ask a Question') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Get answer to all your questions') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.ask.question.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 25 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Landing Page') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write hero text & description') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.landing.page.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 26 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ad" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M7 15v-4a2 2 0 0 1 4 0v4"></path>
                            <path d="M7 13l4 0"></path>
                            <path d="M17 9v6h-1.5a1.5 1.5 0 1 1 1.5 -1.5"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Google Ads') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Generate Google Ads descriptions in within seconds') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.google.ads.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 27 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('AIDA framework') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('The best-known marketing model for tracking the customer journey') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.aida.framework.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 28 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Product Review') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Greatest approach to guarantee that you get and promote review of the highest caliber.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.product.review.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 29 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M3 7l9 6l9 -6"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('Welcome Email') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Write personalized email to welcome the customer for joining your service / product.') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.welcome.email.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
            {{-- Tool 30 --}}
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2">
                <div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200">
                    <div
                        class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-{{ $config[11]->config_value }}-500 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                            <path d="M10 9l5 3l-5 3z"></path>
                         </svg>
                    </div>
                    <h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">{{ __('YouTube Video Description') }}</h3>
                    <p class="text-coolGray-500 font-medium">{{ __('Create your video content with the help of AI') }}</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-auto"><a
                                class="inline-block rounded py-2 px-12 mt-3 w-full text-base md:text-lg leading-4 text-{{ $config[11]->config_value }}-50 font-medium text-center bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 focus:ring-2 focus:ring-{{ $config[11]->config_value }}-500 focus:ring-opacity-50 border border-{{ $config[11]->config_value }}-500 rounded-md shadow-sm"
                                href="{{ route('user.ai.youtube.description.creator') }}">{{ __('Try') }}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Footer --}}
@include('website.includes.footer')
@endsection