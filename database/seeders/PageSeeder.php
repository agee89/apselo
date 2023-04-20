<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Home page
    DB::table('pages')->insert([
      'name' => 'Home',
      'title' => 'Content',
      'slug' => 'home',
      'body' => '<div class="relative bg-gray-50 pt-20 md:pt-10 pb-24 lg:py-20">
            <div class="mx-auto lg:px-80 px-6">
              <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-1/2 px-4 flex items-center">
                  <div class="w-full text-center lg:text-left">
                    <div
                      class="relative max-w-md mx-auto lg:mx-0"
                      data-aos="fade-up"
                    >
                      <h2 class="mb-3 text-4xl lg:text-5xl font-bold font-heading">
                        <span class="text-yellow-500">AI Tools</span>
                        <span>Ultimate Solution for Content Creation!</span>
                      </h2>
                    </div>
                    <div
                      class="relative max-w-sm mx-auto lg:mx-0"
                      data-aos="fade-up"
                    >
                      <p class="mb-6 text-gray-400 leading-loose">
                        Generate Engaging and High-Quality Content in Minutes with the
                        Help of AI.
                      </p>
                      <div>
                        <a
                          class="inline-block mb-3 lg:mb-0 lg:mr-3 w-full lg:w-auto py-2 px-6 leading-loose bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200"
                          href="../../register"
                          >Sign Up</a
                        >
                        <a
                          class="inline-block w-full lg:w-auto py-2 px-6 mr-2 leading-loose font-semibold text-gray-50 bg-gray-500 hover:bg-gray-600 rounded-l-xl rounded-t-xl transition duration-200"
                          href="/features"
                          >More features</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="w-full lg:w-1/2">
                  <div class="flex flex-wrap -mx-4">
                    <img
                      class="lg:absolute top-0 my-12 lg:my-0 h-full w-full lg:w-1/3 rounded-3xl lg:rounded-none md:inline-flex"
                      src="../../images/web/background/slider.svg"
                      alt="AI Tools"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          ',
      'page_title' => 'Home - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // Features page
    DB::table('pages')->insert([
      'name' => 'Features',
      'title' => 'Content',
      'slug' => 'features',
      'body' => '<section class="py-24 md:pb-32 bg-white" style="background-image: url("flex-ui-assets/elements/pattern-white.svg"); background-position: center;"><div class="container mx-auto px-4"><div class="md:max-w-4xl mb-12 mx-auto text-center" data-aos="fade-up"><span class="inline-block py-px px-2 mb-4 text-xs leading-5 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-full shadow-sm">#1 Fastest growing content creator</span><h1 class="mb-4 text-3xl md:text-4xl leading-tight font-bold tracking-tighter">Main Features</h1></div><div class="flex flex-wrap -mx-4" data-aos="fade-up" data-aos-delay="100"><div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2"><div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200"><div class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-yellow-500 rounded-lg"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWFydGljbGUiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPgogIDxwYXRoIHN0cm9rZT0ibm9uZSIgZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPgogIDxwYXRoIGQ9Ik0zIDRtMCAyYTIgMiAwIDAgMSAyIC0yaDE0YTIgMiAwIDAgMSAyIDJ2MTJhMiAyIDAgMCAxIC0yIDJoLTE0YTIgMiAwIDAgMSAtMiAtMnoiIC8+CiAgPHBhdGggZD0iTTcgOGgxMCIgLz4KICA8cGF0aCBkPSJNNyAxMmgxMCIgLz4KICA8cGF0aCBkPSJNNyAxNmgxMCIgLz4KPC9zdmc+CgoK"></div><h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">Automated Content Generation</h3><p class="text-coolGray-500 font-medium">AI content creation uses machine learning algorithms to automatically generate high-quality, engaging content across various mediums, including articles, blogs, social media posts, and more.</p></div></div><div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2"><div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200"><div class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-yellow-500 rounded-lg"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWFydGljbGUiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPgogIDxwYXRoIHN0cm9rZT0ibm9uZSIgZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPgogIDxwYXRoIGQ9Ik0zIDRtMCAyYTIgMiAwIDAgMSAyIC0yaDE0YTIgMiAwIDAgMSAyIDJ2MTJhMiAyIDAgMCAxIC0yIDJoLTE0YTIgMiAwIDAgMSAtMiAtMnoiIC8+CiAgPHBhdGggZD0iTTcgOGgxMCIgLz4KICA8cGF0aCBkPSJNNyAxMmgxMCIgLz4KICA8cGF0aCBkPSJNNyAxNmgxMCIgLz4KPC9zdmc+CgoK"></div><h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">Customizable Tone and Style</h3><p class="text-coolGray-500 font-medium">The content generated by AI can be tailored to match the tone and style of your brand, making it easier to maintain consistency across all of your content.</p></div></div><div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2"><div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200"><div class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-yellow-500 rounded-lg"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWFydGljbGUiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPgogIDxwYXRoIHN0cm9rZT0ibm9uZSIgZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPgogIDxwYXRoIGQ9Ik0zIDRtMCAyYTIgMiAwIDAgMSAyIC0yaDE0YTIgMiAwIDAgMSAyIDJ2MTJhMiAyIDAgMCAxIC0yIDJoLTE0YTIgMiAwIDAgMSAtMiAtMnoiIC8+CiAgPHBhdGggZD0iTTcgOGgxMCIgLz4KICA8cGF0aCBkPSJNNyAxMmgxMCIgLz4KICA8cGF0aCBkPSJNNyAxNmgxMCIgLz4KPC9zdmc+CgoK"></div><h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">Collaboration and Workflow Management</h3><p class="text-coolGray-500 font-medium">AI content creation can collaborate with team members, manage workflows, and track progress using AI-powered project management tools.</p></div></div><div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2"><div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200"><div class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-yellow-500 rounded-lg"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWFydGljbGUiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPgogIDxwYXRoIHN0cm9rZT0ibm9uZSIgZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPgogIDxwYXRoIGQ9Ik0zIDRtMCAyYTIgMiAwIDAgMSAyIC0yaDE0YTIgMiAwIDAgMSAyIDJ2MTJhMiAyIDAgMCAxIC0yIDJoLTE0YTIgMiAwIDAgMSAtMiAtMnoiIC8+CiAgPHBhdGggZD0iTTcgOGgxMCIgLz4KICA8cGF0aCBkPSJNNyAxMmgxMCIgLz4KICA8cGF0aCBkPSJNNyAxNmgxMCIgLz4KPC9zdmc+CgoK"></div><h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">SEO Optimization</h3><p class="text-coolGray-500 font-medium">AI content creation can optimize content for search engines, improving the visibility and ranking of your content in search results.</p></div></div><div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2"><div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200"><div class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-yellow-500 rounded-lg"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWFydGljbGUiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPgogIDxwYXRoIHN0cm9rZT0ibm9uZSIgZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPgogIDxwYXRoIGQ9Ik0zIDRtMCAyYTIgMiAwIDAgMSAyIC0yaDE0YTIgMiAwIDAgMSAyIDJ2MTJhMiAyIDAgMCAxIC0yIDJoLTE0YTIgMiAwIDAgMSAtMiAtMnoiIC8+CiAgPHBhdGggZD0iTTcgOGgxMCIgLz4KICA8cGF0aCBkPSJNNyAxMmgxMCIgLz4KICA8cGF0aCBkPSJNNyAxNmgxMCIgLz4KPC9zdmc+CgoK"></div><h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">Topic Research</h3><p class="text-coolGray-500 font-medium">AI content creation can generate ideas and topic suggestions for content creation, based on user input and analysis of current trends and popular search terms.</p></div></div><div class="w-full md:w-1/2 lg:w-1/3 px-4 py-2"><div class="h-full p-8 text-center hover:bg-white rounded-md shadow-md hover:shadow-xl transition duration-200"><div class="inline-flex h-16 w-16 mb-6 mx-auto items-center justify-center text-white bg-yellow-500 rounded-lg"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWFydGljbGUiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPgogIDxwYXRoIHN0cm9rZT0ibm9uZSIgZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPgogIDxwYXRoIGQ9Ik0zIDRtMCAyYTIgMiAwIDAgMSAyIC0yaDE0YTIgMiAwIDAgMSAyIDJ2MTJhMiAyIDAgMCAxIC0yIDJoLTE0YTIgMiAwIDAgMSAtMiAtMnoiIC8+CiAgPHBhdGggZD0iTTcgOGgxMCIgLz4KICA8cGF0aCBkPSJNNyAxMmgxMCIgLz4KICA8cGF0aCBkPSJNNyAxNmgxMCIgLz4KPC9zdmc+CgoK"></div><h3 class="mb-4 text-xl md:text-2xl leading-tight font-bold">Content Analysis</h3><p class="text-coolGray-500 font-medium">AI content creation can analyze the performance and engagement of content, using data and metrics to improve future content creation.</p></div></div></div></div></section><section class="py-20 bg-gray-50" data-aos="fade-up" data-aos-delay="300"><div class="container mx-auto px-4"><div class="flex flex-wrap items-center justify-center"><div class="w-auto mb-10 lg:mb-0 lg:mr-8 py-8 px-2 rounded"><img class="h-12" src="../../images/web/logo/logo.png" alt=""></div><div class="w-full lg:w-auto mb-10 lg:mb-0 text-center lg:text-left"><h2 class="max-w-xl mx-auto lg:mx-0 mb-2 text-4xl lg:text-5xl font-bold font-heading">Many useful features</h2><p class="max-w-xl mx-auto lg:mx-0 text-gray-500 leading-loose">With AI Content Creation, you can generate high-quality, engaging content across various mediums, including articles, blogs, social media posts, and more, with ease.</p></div><div class="w-full lg:w-auto lg:ml-auto text-center"><a class="inline-block py-2 px-6 mx-24 bg-yellow-500 hover:bg-yellow-600 text-white font-bold leading-loose rounded-l-xl rounded-t-xl transition duration-200" href="../../register">Register</a></div></div></div></section>',
      'page_title' => 'Features - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // Tools page
    DB::table('pages')->insert([
      'name' => 'Tools',
      'title' => 'Content',
      'slug' => 'tools',
      'body' => '<div class="md:max-w-4xl mb-12 mx-auto text-center" data-aos="fade-up"><span class="inline-block py-px px-2 mb-4 text-xs leading-5 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-full shadow-sm">Tools</span>
            <h1 class="mb-4 text-3xl md:text-4xl leading-tight font-bold tracking-tighter">Transform Your Content Creation with AI</h1>
            <p class="text-lg md:text-xl text-coolGray-500 font-medium">Create high-quality content faster and easier than ever before using the power of artificial intelligence technology.</p>
            </div>',
      'page_title' => 'Tools - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // About page
    DB::table('pages')->insert([
      'name' => 'About Us',
      'title' => 'Content',
      'slug' => 'about',
      'body' => '<section class="py-20 xl:pt-24 xl:pb-28 bg-white" style="background-image: url("../../images/web/elements/pattern-white.svg"); background-position: center;">
            <div class="container px-4 mx-auto">
            <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-1/2 px-4 mb-5 lg:mb-0" data-aos="fade-up"><span class="inline-block py-px px-2 mb-4 text-xs leading-5 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-9xl">About Us</span>
            <h3 class="mb-5 text-3xl md:text-4xl text-gray-900 font-bold tracking-tighter">Revolutionizing Content Creation with AI-Powered Tools</h3>
            <p class="mb-5 text-lg font-medium leading-7 text-gray-500"><span style="font-size: 12pt;"><strong>At AI Tools</strong>, </span>we believe that creating high-quality content should be easy and accessible for everyone. That is why we will developed an AI-powered content creation tool that automates the content creation process and generates engaging content across various mediums, including articles, blogs, social media posts, and more.</p>
            <p class="mb-5 text-lg font-medium leading-7 text-gray-500">Our team consists of experts in machine learning, natural language processing, and content creation who work tirelessly to ensure that our product is user-friendly, effective, and reliable. We are committed to using AI technology to make content creation more efficient and effective for our users.</p>
            <p class="mb-5 text-lg font-medium leading-7 text-gray-500">With AI Tools Content Creation, you can customize the tone and style of your content to match your brand, optimize your content for search engines, and generate topic suggestions based on current trends and popular search terms. Our machine learning algorithms analyze your input and use natural language processing to generate content that matches the tone and style of your brand.</p>
            </div>
            <div class="w-full lg:w-1/2 px-4" data-aos="fade-up" data-aos-delay="100">
            <p class="mb-5 text-lg font-medium leading-7 text-gray-500">We are also dedicated to providing exceptional customer service and support to help our clients achieve their content creation goals. Our team is always available to answer any questions, provide guidance, and troubleshoot any issues that may arise.</p>
            <p class="mb-5 text-lg font-medium leading-7 text-gray-500">In addition, AI Tools Content Creation is designed to streamline collaboration and workflow management. You can collaborate with team members, assign tasks, and track progress using AI-powered project management tools, saving you time and effort in the content creation process.</p>
            <p class="mb-5 text-lg font-medium leading-7 text-gray-500">At AI Tools, we are passionate about using AI technology to make content creation more accessible and efficient for everyone. Our product is constantly evolving and improving to meet the needs of our users. We are excited to continue innovating in the content creation space and helping our users create exceptional content with ease.</p>
            <p class="text-lg font-medium leading-7 text-gray-500">We understand that creating content can be time-consuming and challenging, which is why we will designed our tool to be user-friendly, effective, and reliable. Whether you are a seasoned content creator or just getting started, our AI-powered content creation tool can help you streamline the content creation process and produce exceptional content that resonates with your audience.</p>
            </div>
            </div>
            </div>
            </section>',
      'page_title' => 'About us - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // Pricing page
    DB::table('pages')->insert([
      'name' => 'Pricing',
      'title' => 'Content',
      'slug' => 'pricing',
      'body' => '<div class="text-center" data-aos="fade-up"><span class="inline-block py-px px-2 mb-4 text-xs leading-5 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-9xl">Pricing</span>
            <h3 class="mb-4 text-3xl md:text-5xl text-gray-900 font-bold tracking-tighter">Flexible pricing plan for your startup</h3>
            <p class="mb-12 text-lg md:text-xl text-gray-500 font-medium">Pricing that scales with your business immediately.</p>
            </div>',
      'page_title' => 'Pricing - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    DB::table('pages')->insert([
      'name' => 'Pricing',
      'title' => 'Content',
      'slug' => 'pricing',
      'body' => '<div class="relative -mb-40 py-16 px-4 md:px-8 lg:px-16 bg-gray-900 rounded-xl overflow-hidden" style="background-image: url("../../images/web/elements/pattern-dark.svg"); background-position: center;" data-aos="fade-up">
          <div class="relative max-w-max mx-auto text-center">
          <h3 class="mb-2 text-2xl md:text-5xl leading-tight font-bold text-white tracking-tighter">If you need unique features</h3>
          <p class="mb-6 text-base md:text-xl text-gray-400">Speak with our team of experienced content creation experts to get advice and feedback on your content. Whether you are struggling to find the right words or need help optimizing your content for SEO, our experts are here to help.</p>
          <a class="inline-block mb-3 lg:mb-0 lg:mr-3 w-1/3 lg:full py-2 px-6 leading-loose bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200 text-center" href="../../contact">Get in touch</a></div>
          </div>',
      'page_title' => 'Pricing - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // Contact page
    DB::table('pages')->insert([
      'name' => 'Contact us',
      'title' => 'Content',
      'slug' => 'contact',
      'body' => '<div class="flex flex-wrap mb-24 lg:mb-18 justify-between items-center" data-aos="fade-up">
      <div class="w-full lg:w-1/2 mb-10 lg:mb-0">
      <span class="inline-block py-px px-2 mb-4 text-xs leading-5 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-9xl">Contact us</span>
      <h3 class="mb-4 text-4xl md:text-5xl text-darkgray-900 font-bold tracking-tighter leading-tight">
      Let’s stay connected</h3>
      <p class="text-lg md:text-xl text-gray-500 font-medium">It is never been easier to get in touch with Flex. Call us, use our live chat widget or email and we will get back to you as soon as possible!</p>
      </div>
      <div class="w-full lg:w-auto">
      <div class="flex flex-wrap justify-center items-center md:justify-start -mb-2"><a class="inline-block mb-3 lg:mb-0 lg:mr-3 w-full lg:full py-2 px-6 leading-loose bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200 text-center" href="https://aitools.goapps.co.in/about">About Us</a></div>
      </div>
      </div>',
      'page_title' => 'Contact us - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    DB::table('pages')->insert([
      'name' => 'Contact us',
      'title' => 'Content',
      'slug' => 'contact',
      'body' => '<div class="w-full lg:w-1/2 px-4 mb-14 lg:mb-0">
            <div class="flex flex-wrap -mx-4" data-aos="fade-up" data-aos-delay="100">
            <div class="w-full md:w-1/2 px-4 mb-10">
            <div class="max-w-xs mx-auto">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 bg-yellow-500 rounded-full"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLW1haWwtb3BlbmVkIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj4KICA8cGF0aCBzdHJva2U9Im5vbmUiIGQ9Ik0wIDBoMjR2MjRIMHoiIGZpbGw9Im5vbmUiLz4KICA8cGF0aCBkPSJNMyA5bDkgNmw5IC02bC05IC02bC05IDYiIC8+CiAgPHBhdGggZD0iTTIxIDl2MTBhMiAyIDAgMCAxIC0yIDJoLTE0YTIgMiAwIDAgMSAtMiAtMnYtMTAiIC8+CiAgPHBhdGggZD0iTTMgMTlsNiAtNiIgLz4KICA8cGF0aCBkPSJNMTUgMTNsNiA2IiAvPgo8L3N2Zz4KCgo="></div>
            <h3 class="mb-4 text-2xl md:text-3xl font-bold leading-9 text-gray-900">Email</h3>
            <a class="text-lg md:text-xl text-gray-500 hover:text-gray-500 font-medium" href="mailto:contact@aitools.com">contact@aitools.com</a></div>
            </div>
            <div class="w-full md:w-1/2 px-4 mb-10">
            <div class="max-w-xs mx-auto">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 bg-yellow-500 rounded-full"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLXBob25lIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj4KICA8cGF0aCBzdHJva2U9Im5vbmUiIGQ9Ik0wIDBoMjR2MjRIMHoiIGZpbGw9Im5vbmUiLz4KICA8cGF0aCBkPSJNNSA0aDRsMiA1bC0yLjUgMS41YTExIDExIDAgMCAwIDUgNWwxLjUgLTIuNWw1IDJ2NGEyIDIgMCAwIDEgLTIgMmExNiAxNiAwIDAgMSAtMTUgLTE1YTIgMiAwIDAgMSAyIC0yIiAvPgo8L3N2Zz4KCgo="></div>
            <h3 class="mb-4 text-2xl md:text-3xl font-bold leading-9 text-gray-900">Phone</h3>
            <p class="text-lg md:text-xl text-gray-500 font-medium">+91 987-654-3210</p>
            </div>
            </div>
            <div class="w-full md:w-1/2 px-4 mb-10 md:mb-0">
            <div class="max-w-xs mx-auto">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 bg-yellow-500 rounded-full"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLW1hcC1waW4tZmlsbGVkIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj4KICA8cGF0aCBzdHJva2U9Im5vbmUiIGQ9Ik0wIDBoMjR2MjRIMHoiIGZpbGw9Im5vbmUiLz4KICA8cGF0aCBkPSJNMTguMzY0IDQuNjM2YTkgOSAwIDAgMSAuMjAzIDEyLjUxOWwtLjIwMyAuMjFsLTQuMjQzIDQuMjQyYTMgMyAwIDAgMSAtNC4wOTcgLjEzNWwtLjE0NCAtLjEzNWwtNC4yNDQgLTQuMjQzYTkgOSAwIDAgMSAxMi43MjggLTEyLjcyOHptLTYuMzY0IDMuMzY0YTMgMyAwIDEgMCAwIDZhMyAzIDAgMCAwIDAgLTZ6IiBzdHJva2Utd2lkdGg9IjAiIGZpbGw9ImN1cnJlbnRDb2xvciIgLz4KPC9zdmc+CgoK"></div>
            <h3 class="mb-4 text-2xl md:text-3xl font-bold leading-9 text-gray-900">Office</h3>
            <p class="text-lg md:text-xl text-gray-500 font-medium">1686, Geraldine Lane</p>
            <p class="text-lg md:text-xl text-gray-500 font-medium">New York, NY 10013</p>
            </div>
            </div>
            <div class="w-full md:w-1/2 px-4">
            <div class="max-w-xs mx-auto">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 bg-yellow-500 rounded-full"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWJ1aWxkaW5nIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj4KICA8cGF0aCBzdHJva2U9Im5vbmUiIGQ9Ik0wIDBoMjR2MjRIMHoiIGZpbGw9Im5vbmUiLz4KICA8cGF0aCBkPSJNMyAyMWwxOCAwIiAvPgogIDxwYXRoIGQ9Ik05IDhsMSAwIiAvPgogIDxwYXRoIGQ9Ik05IDEybDEgMCIgLz4KICA8cGF0aCBkPSJNOSAxNmwxIDAiIC8+CiAgPHBhdGggZD0iTTE0IDhsMSAwIiAvPgogIDxwYXRoIGQ9Ik0xNCAxMmwxIDAiIC8+CiAgPHBhdGggZD0iTTE0IDE2bDEgMCIgLz4KICA8cGF0aCBkPSJNNSAyMXYtMTZhMiAyIDAgMCAxIDIgLTJoMTBhMiAyIDAgMCAxIDIgMnYxNiIgLz4KPC9zdmc+CgoK"></div>
            <h3 class="mb-9 text-2xl md:text-3xl font-bold leading-9 text-gray-900">Socials</h3>
            <a class="inline-block mr-8 text-yellow-500 hover:text-yellow-500" href="#">
            <div class="max-w-xs mx-auto"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWJyYW5kLWZhY2Vib29rIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj4KICA8cGF0aCBzdHJva2U9Im5vbmUiIGQ9Ik0wIDBoMjR2MjRIMHoiIGZpbGw9Im5vbmUiLz4KICA8cGF0aCBkPSJNNyAxMHY0aDN2N2g0di03aDNsMSAtNGgtNHYtMmExIDEgMCAwIDEgMSAtMWgzdi00aC0zYTUgNSAwIDAgMCAtNSA1djJoLTMiIC8+Cjwvc3ZnPgoKCg=="></div>
            </a> <a class="inline-block mr-8 text-yellow-500 hover:text-yellow-500" href="#">
            <div class="max-w-xs mx-auto"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWJyYW5kLXR3aXR0ZXIiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZT0iY3VycmVudENvbG9yIiBmaWxsPSJub25lIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPgogIDxwYXRoIHN0cm9rZT0ibm9uZSIgZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPgogIDxwYXRoIGQ9Ik0yMiA0LjAxYy0xIC40OSAtMS45OCAuNjg5IC0zIC45OWMtMS4xMjEgLTEuMjY1IC0yLjc4MyAtMS4zMzUgLTQuMzggLS43MzdzLTIuNjQzIDIuMDYgLTIuNjIgMy43Mzd2MWMtMy4yNDUgLjA4MyAtNi4xMzUgLTEuMzk1IC04IC00YzAgMCAtNC4xODIgNy40MzMgNCAxMWMtMS44NzIgMS4yNDcgLTMuNzM5IDIuMDg4IC02IDJjMy4zMDggMS44MDMgNi45MTMgMi40MjMgMTAuMDM0IDEuNTE3YzMuNTggLTEuMDQgNi41MjIgLTMuNzIzIDcuNjUxIC03Ljc0MmExMy44NCAxMy44NCAwIDAgMCAuNDk3IC0zLjc1M2MwIC0uMjQ5IDEuNTEgLTIuNzcyIDEuODE4IC00LjAxM3oiIC8+Cjwvc3ZnPgoKCg=="></div>
            </a> <a class="inline-block mr-8 text-yellow-500 hover:text-yellow-500" href="#">
            <div class="max-w-xs mx-auto"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWJyYW5kLWluc3RhZ3JhbSIgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlPSJjdXJyZW50Q29sb3IiIGZpbGw9Im5vbmUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+CiAgPHBhdGggc3Ryb2tlPSJub25lIiBkPSJNMCAwaDI0djI0SDB6IiBmaWxsPSJub25lIi8+CiAgPHBhdGggZD0iTTQgNG0wIDRhNCA0IDAgMCAxIDQgLTRoOGE0IDQgMCAwIDEgNCA0djhhNCA0IDAgMCAxIC00IDRoLThhNCA0IDAgMCAxIC00IC00eiIgLz4KICA8cGF0aCBkPSJNMTIgMTJtLTMgMGEzIDMgMCAxIDAgNiAwYTMgMyAwIDEgMCAtNiAwIiAvPgogIDxwYXRoIGQ9Ik0xNi41IDcuNWwwIC4wMSIgLz4KPC9zdmc+CgoK"></div>
            </a> <a class="inline-block text-yellow-500 hover:text-yellow-500" href="#">
            <div class="max-w-xs mx-auto"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJpY29uIGljb24tdGFibGVyIGljb24tdGFibGVyLWJyYW5kLWxpbmtlZGluIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj4KICA8cGF0aCBzdHJva2U9Im5vbmUiIGQ9Ik0wIDBoMjR2MjRIMHoiIGZpbGw9Im5vbmUiLz4KICA8cGF0aCBkPSJNNCA0bTAgMmEyIDIgMCAwIDEgMiAtMmgxMmEyIDIgMCAwIDEgMiAydjEyYTIgMiAwIDAgMSAtMiAyaC0xMmEyIDIgMCAwIDEgLTIgLTJ6IiAvPgogIDxwYXRoIGQ9Ik04IDExbDAgNSIgLz4KICA8cGF0aCBkPSJNOCA4bDAgLjAxIiAvPgogIDxwYXRoIGQ9Ik0xMiAxNmwwIC01IiAvPgogIDxwYXRoIGQ9Ik0xNiAxNnYtM2EyIDIgMCAwIDAgLTQgMCIgLz4KPC9zdmc+CgoK"></div>
            </a></div>
            </div>
            </div>
            </div>',
      'page_title' => 'Contact us - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // FAQs
    DB::table('pages')->insert([
      'name' => 'FAQs',
      'title' => 'Content',
      'slug' => 'faq',
      'body' => '<section class="pt-24 bg-white" style="background-image: url("../../images/web/elements/pattern-white.svg"); background-position: center;">
            <div class="container px-4 mx-auto">
            <div class="max-w-4xl mb-16" data-aos="fade-up">
            <span class="inline-block py-px px-2 mb-4 text-xs leading-5 text-yellow-500 bg-yellow-100 font-medium rounded-full shadow-sm">FAQs</span>
            <h2 class="mb-4 text-4xl md:text-5xl leading-tight text-gray-900 font-bold tracking-tighter">Frequently Asked Questions</h2>
            <p class="text-lg md:text-xl text-gray-500 font-medium">AI Tools is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.</p>
            </div>
            <div class="flex flex-wrap pb-16 -mx-4" data-aos="fade-up">
            <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="100">
            <div class="md:max-w-xs">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 rounded-full bg-yellow-500">
            <img src="../../images/web/elements/shield-icon.svg" alt="">
            </div>
            <h3 class="mb-6 text-xl font-bold text-gray-900">What shipping options do you have?
            </h3>
            <p class="font-medium text-gray-500">For USA domestic orders we offer FedEx and USPS shipping. Contact us via email to learn more.</p>
            </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="200">
            <div class="md:max-w-xs">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 rounded-full bg-yellow-500">
            <img src="../../images/web/elements/shield-icon.svg" alt="">
            </div>
            <h3 class="mb-6 text-xl font-bold text-gray-900">What payment methods do you accept?
            </h3>
            <p class="font-medium text-gray-500">Any method of payments acceptable by you. For example: We accept MasterCard, Visa.</p>
            </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="300">
            <div class="md:max-w-xs">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 rounded-full bg-yellow-500">
            <img src="../../images/web/elements/shield-icon.svg" alt="">
            </div>
            <h3 class="mb-6 text-xl font-bold text-gray-900">How long does it take to ship my order?</h3>
            <p class="font-medium text-gray-500">Orders are usually shipped within 1-2 business days after placing the order.</p>
            </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8 xl:mb-0" data-aos="fade-up" data-aos-delay="400">
            <div class="md:max-w-xs">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 rounded-full bg-yellow-500">
            <img src="../../images/web/elements/shield-icon.svg" alt="">
            </div>
            <h3 class="mb-6 text-xl font-bold text-gray-900">What shipping options do you have?
            </h3>
            <p class="font-medium text-gray-500">For USA domestic orders we offer FedEx and USPS shipping. Contact us via email to learn more.</p>
            </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8 md:mb-0" data-aos="fade-up" data-aos-delay="500">
            <div class="md:max-w-xs">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 rounded-full bg-yellow-500">
            <img src="../../images/web/elements/shield-icon.svg" alt="">
            </div>
            <h3 class="mb-6 text-xl font-bold text-gray-900">What payment methods do you accept?
            </h3>
            <p class="font-medium text-gray-500">Any method of payments acceptable by you. For example: We accept MasterCard, Visa.</p>
            </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 px-4" data-aos="fade-up" data-aos-delay="500">
            <div class="md:max-w-xs">
            <div class="inline-flex mb-6 items-center justify-center w-12 h-12 rounded-full bg-yellow-500">
            <img src="../../images/web/elements/shield-icon.svg" alt="">
            </div>
            <h3 class="mb-6 text-xl font-bold text-gray-900">How long does it take to ship my order?</h3>
            <p class="font-medium text-gray-500">Orders are usually shipped within 1-2 business days after placing the order.</p>
            </div>
            </div>
            </div>
            <div class="relative -mb-40 py-16 px-4 md:px-8 lg:px-16 bg-gray-900 rounded-xl overflow-hidden aos-init" data-aos="fade-up" style="background-image: url("../../images/web/elements/pattern-dark.svg"); background-position: center;">
            <div class="relative max-w-max mx-auto text-center">
            <h3 class="mb-2 text-2xl md:text-5xl leading-tight font-bold text-white tracking-tighter">Have any additional questions?</h3>
            <p class="mb-6 text-base md:text-xl text-gray-400">Schedule More Answers with Our AI Content Creation Experts.</p>
            <a class="inline-block mb-3 lg:mb-0 lg:mr-3 w-1/3 lg:full py-2 px-6 leading-loose bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200 text-center" href="#">Get in touch</a>
            </div>
            </div>
            </div>
            <div class="h-64 bg-gray-50"></div>
            </section>',
      'page_title' => 'FAQs - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // Privacy policy
    DB::table('pages')->insert([
      'name' => 'Privacy Policy',
      'title' => 'Content',
      'slug' => 'privacy-policy',
      'body' => '<section class="py-20 xl:pt-24 xl:pb-28 bg-white" style="background-image: url("../../images/web/elements/pattern-white.svg"); background-position: center;">
            <div class="container px-4 mx-auto">
            <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 mb-10" data-aos="fade-up">
            <div class="flex flex-wrap justify-between items-center">
            <div class="w-full md:w-1/2 mb-10 md:mb-0"><span class="inline-block py-px px-2 mb-4 text-xl leading-7 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-9xl">Privacy Policy</span></div>
            <div class="w-full md:w-auto">
            <div class="flex flex-wrap justify-center items-center -mb-2"><a class="inline-block mb-3 lg:mb-0 lg:mr-3 w-full lg:full py-2 px-6 leading-7 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200 text-center" href="#">Updated on : 24-04-2022 20:30 PM</a></div>
            </div>
            </div>
            </div>
            <div class="w-full lg:w-1/2 px-4 mb-5 lg:mb-0" data-aos="fade-up" data-aos-delay="100">
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">At AI Tools Content Creation, we are committed to protecting your privacy and safeguarding your personal information. This Privacy Policy outlines how we collect, use, and protect your information when you use our AI-powered content creation tool.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Collection of Information</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We collect information that you provide to us when you register for our services or use our content creation tool. This information may include your name, email address, company name, and other contact information. We may also collect information about your use of our tool, including your browsing history, search terms, and other usage data.</p>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Use of Information</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We use your information to provide you with our content creation services and to improve our product. We may also use your information to send you marketing communications and other updates about our product, but you can opt-out of these communications at any time.</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We do not sell or rent your personal information to third parties. However, we may share your information with trusted third-party service providers who help us provide our services, such as payment processors, analytics providers, and customer support providers. We require these service providers to safeguard your personal information and only use it for the purposes for which it was provided.</p>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Security</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We take the security of your personal information seriously and have implemented measures to protect it from unauthorized access, use, or disclosure. We use industry-standard encryption technology to protect your information during transmission, and we store your information in secure data centers with restricted access.</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">However, no method of transmission over the internet or electronic storage is completely secure, and we cannot guarantee the absolute security of your information.</p>
            </div>
            <div class="w-full lg:w-1/2 px-4" data-aos="fade-up" data-aos-delay="200">
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Cookies</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We may use cookies and similar technologies to collect information about your use of our tool and improve our product. You can control the use of cookies through your browser settings, but disabling cookies may limit your ability to use some features of our tool.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Changes to this Policy</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We may update this Privacy Policy from time to time to reflect changes in our practices or the law. We encourage you to review this Policy periodically to stay informed about how we collect, use, and protect your personal information.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Contact Us</p>
            <p class="text-md font-medium leading-7 text-gray-500">If you have any questions or concerns about this Privacy Policy or our practices, please contact us at support@aitools.com.</p>
            </div>
            </div>
            </div>
            </section>',
      'page_title' => 'Privacy Policy - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // Refund policy
    DB::table('pages')->insert([
      'name' => 'Refund Policy',
      'title' => 'Content',
      'slug' => 'refund-policy',
      'body' => '<section class="py-20 xl:pt-24 xl:pb-28 bg-white" style="background-image: url("../../images/web/elements/pattern-white.svg"); background-position: center;">
            <div class="container px-4 mx-auto">
            <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 mb-10" data-aos="fade-up">
            <div class="flex flex-wrap justify-between items-center">
            <div class="w-full md:w-1/2 mb-10 md:mb-0"><span class="inline-block py-px px-2 mb-4 text-xl leading-7 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-9xl">Refund Policy</span></div>
            <div class="w-full md:w-auto">
            <div class="flex flex-wrap justify-center items-center -mb-2"><a class="inline-block mb-3 lg:mb-0 lg:mr-3 w-full lg:full py-2 px-6 leading-loose bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200 text-center" href="#">Updated on : 23-04-2022 20:30 PM</a></div>
            </div>
            </div>
            </div>
            <div class="w-full lg:w-1/2 px-4 mb-5 lg:mb-0" data-aos="fade-up" data-aos-delay="100">
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">At AI Tools Content Creation, we want our customers to be completely satisfied with our AI-powered content creation tool. If you are not satisfied with our product for any reason, you may be eligible for a refund.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800"><strong>Refund Eligibility</strong></p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">To be eligible for a refund, you must meet the following conditions:</p>
            <ol class="mb-5 list-decimal list-inside text-md font-medium leading-7 text-gray-500">
            <li><span class="text-md font-medium leading-7 text-gray-500">You have purchased a subscription to our content creation tool within the past 30 days</span></li>
            <li><span class="text-md font-medium leading-7 text-gray-500">You have used our tool and can demonstrate that it did not meet your expectations</span></li>
            <li><span class="text-md font-medium leading-7 text-gray-500">You have contacted our customer support team to try to resolve the issue</span></li>
            </ol>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Refund Process</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">To request a refund, please contact our customer support team at support@aitools.com. We will review your request and may ask for additional information to help us understand the issue. If we determine that you are eligible for a refund, we will process it within 7 business days.</p>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Refund Amount</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">The amount of your refund will depend on the terms of your subscription and the length of time you have used our tool. We may deduct a pro-rated amount based on the amount of time you have used our tool or any discounts or promotions you received at the time of purchase.</p>
            </div>
            <div class="w-full lg:w-1/2 px-4" data-aos="fade-up" data-aos-delay="200">
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Exclusions</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We reserve the right to deny refund requests in certain circumstances, including but not limited to:</p>
            <ol class="mb-5 list-decimal list-inside text-md font-medium leading-7 text-gray-500">
            <li><span class="text-md font-medium leading-7 text-gray-500">Fraudulent or abusive behavior</span></li>
            <li><span class="text-md font-medium leading-7 text-gray-500">Violation of our Terms of Service</span></li>
            <li><span class="text-md font-medium leading-7 text-gray-500">Technical issues outside of our control, such as internet connectivity or device issues</span></li>
            </ol>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Changes to this Policy</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We may update this Refund Policy from time to time to reflect changes in our practices or the law. We encourage you to review this Policy periodically to stay informed about our refund process.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Contact Us</p>
            <p class="text-md font-medium leading-7 text-gray-500">If you have any questions or concerns about this Refund Policy or our practices, please contact us at support@aitools.com.</p>
            </div>
            </div>
            </div>
            </section>',
      'page_title' => 'Refund Policy - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);

    // Terms and Conditions
    DB::table('pages')->insert([
      'name' => 'Terms and Conditions',
      'title' => 'Content',
      'slug' => 'terms-and-conditions',
      'body' => '<section class="py-20 xl:pt-24 xl:pb-28 bg-white" style="background-image: url("../../images/web/elements/pattern-white.svg"); background-position: center;">
            <div class="container px-4 mx-auto">
            <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 mb-10" data-aos="fade-up">
            <div class="flex flex-wrap justify-between items-center">
            <div class="w-full md:w-1/2 mb-10 md:mb-0"><span class="inline-block py-px px-2 mb-4 text-xl leading-7 text-yellow-500 bg-yellow-100 font-medium uppercase rounded-9xl">Terms and Conditions</span></div>
            <div class="w-full md:w-auto">
            <div class="flex flex-wrap justify-center items-center -mb-2"><a class="inline-block mb-3 lg:mb-0 lg:mr-3 w-full lg:full py-2 px-6 leading-7 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200 text-center" href="#">Updated on : 23-04-2022 20:30 PM</a></div>
            </div>
            </div>
            </div>
            <div class="w-full lg:w-1/2 px-4 mb-5 lg:mb-0" data-aos="fade-up" data-aos-delay="100">
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">Welcome to AI Tools Content Creation. By using our AI-powered content creation tool, you agree to the following terms and conditions. Please read them carefully.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Use of our Tool</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">Our tool<strong> </strong>is designed to assist you in creating content for your personal or commercial use. You may not use our tool for any illegal or unauthorized purpose, including but not limited to copyright infringement or plagiarism.</p>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Account Registration</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">To use our tool, you must create an account and provide accurate and complete information about yourself. You are responsible for maintaining the security of your account and password, and for any activity that occurs under your account.</p>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Intellectual Property</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">Our tool and its content, including but not limited to text, graphics, logos, and software, are the property of AI Tools Content Creation and are protected by copyright, trademark, and other intellectual property laws. You may not use our content without our express written permission.</p>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Privacy</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We respect your privacy and are committed to protecting your personal information. Please see our Privacy Policy for more information.</p>
            <p class="mb-5 text-xl font-medium leading-7 text-gray-800">Disclaimer of Warranties</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">Our tool is provided "as is" and without warranties of any kind, express or implied, including but not limited to warranties of merchantability, fitness for a particular purpose, and non-infringement. We do not guarantee that our tool will be error-free, uninterrupted, or secure.</p>
            </div>
            <div class="w-full lg:w-1/2 px-4" data-aos="fade-up" data-aos-delay="200">
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Limitation of Liability</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">In no event shall AI Tools Content Creation be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with your use of our tool, whether based on warranty, contract, tort, or any other legal theory.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Indemnification</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">You agree to indemnify and hold AI Tools Content Creation and its affiliates, officers, agents, and employees harmless from any claims, damages, or expenses arising out of or in connection with your use of our tool or your violation of these terms and conditions.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Changes to these Terms and Conditions</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">We may update these terms and conditions from time to time to reflect changes in our practices or the law. We encourage you to review these terms and conditions periodically to stay informed about our policies.</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Governing Law and Jurisdiction</p>
            <p class="mb-5 text-md font-medium leading-7 text-gray-500">These terms and conditions shall be governed by and construed in accordance with the laws of [insert governing law], and any disputes arising out of or in connection with these terms and conditions shall be resolved in the courts of [insert jurisdiction].</p>
            <p class="mb-5 text-xl font-medium leading-2 text-gray-800">Contact Us</p>
            <p class="text-md font-medium leading-7 text-gray-500">If you have any questions or concerns about these terms and conditions or our practices, please contact us at support@aitools.com.</p>
            </div>
            </div>
            </div>
            </section>',
      'page_title' => 'Terms and Conditions - Create High-Quality Content in Minutes',
      'description' => 'AI Tools Content Creator is a powerful online platform that helps you create compelling content using cutting-edge artificial intelligence technology. With AI-powered tools and features, you can create high-quality blog posts, articles, social media posts, and more in a matter of minutes. Start creating engaging content today with AI Tools Content Creator!',
      'keywords' => 'AI Tools Content Creator, artificial intelligence, content creation, blog posts, articles, social media, online platform, AI-powered tools, high-quality content, engaging content.'
    ]);
  }
}
