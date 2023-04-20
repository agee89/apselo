<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\Config;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // All Plans
    public function index()
    {
        // Queries
        $plans = Plan::get();
        $currencies = Setting::where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        return view('admin.pages.plans.index', compact('plans', 'currencies', 'settings', 'config'));
    }

    // Add Plan
    public function addPlan()
    {
        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();

        return view('admin.pages.plans.add', compact('settings', 'config'));
    }

    // Save Plan
    public function savePlan(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'validity' => 'required',
            'templates' => 'required',
            'words' => 'required',
            'images' => 'required'
        ]);

        // blog outline
        if ($request->blog_outline == null) {
            $blog_outline = 0;
        } else {
            $blog_outline = 1;
        }

        // blog headline
        if ($request->blog_headline == null) {
            $blog_headline = 0;
        } else {
            $blog_headline = 1;
        }

        // blog description
        if ($request->blog_description == null) {
            $blog_description = 0;
        } else {
            $blog_description = 1;
        }

        // blog story ideas
        if ($request->blog_story_ideas == null) {
            $blog_story_ideas = 0;
        } else {
            $blog_story_ideas = 1;
        }

        // article content
        if ($request->article_content == null) {
            $article_content = 0;
        } else {
            $article_content = 1;
        }

        // paragraph
        if ($request->paragraph == null) {
            $paragraph = 0;
        } else {
            $paragraph = 1;
        }

        // summarization
        if ($request->summarization == null) {
            $summarization = 0;
        } else {
            $summarization = 1;
        }

        // product name
        if ($request->product_name == null) {
            $product_name = 0;
        } else {
            $product_name = 1;
        }

        // product description
        if ($request->product_description == null) {
            $product_description = 0;
        } else {
            $product_description = 1;
        }

        // startup name
        if ($request->startup_name == null) {
            $startup_name = 0;
        } else {
            $startup_name = 1;
        }

        // service review
        if ($request->service_review == null) {
            $service_review = 0;
        } else {
            $service_review = 1;
        }

        // youtube video titles
        if ($request->youtube_video_titles == null) {
            $youtube_video_titles = 0;
        } else {
            $youtube_video_titles = 1;
        }

        // youtube video tags
        if ($request->youtube_video_tags == null) {
            $youtube_video_tags = 0;
        } else {
            $youtube_video_tags = 1;
        }

        // youtube video outline
        if ($request->youtube_video_outline == null) {
            $youtube_video_outline = 0;
        } else {
            $youtube_video_outline = 1;
        }

        // youtube video intro
        if ($request->youtube_video_intro == null) {
            $youtube_video_intro = 0;
        } else {
            $youtube_video_intro = 1;
        }

        // youtube video ideas
        if ($request->youtube_video_ideas == null) {
            $youtube_video_ideas = 0;
        } else {
            $youtube_video_ideas = 1;
        }

        // youtube short script
        if ($request->youtube_short_script == null) {
            $youtube_short_script = 0;
        } else {
            $youtube_short_script = 1;
        }

        // write for me
        if ($request->write_for_me == null) {
            $write_for_me = 0;
        } else {
            $write_for_me = 1;
        }

        // website meta description
        if ($request->website_meta_description == null) {
            $website_meta_description = 0;
        } else {
            $website_meta_description = 1;
        }

        // website meta keywords
        if ($request->website_meta_keywords == null) {
            $website_meta_keywords = 0;
        } else {
            $website_meta_keywords = 1;
        }

        // website meta title
        if ($request->website_meta_title == null) {
            $website_meta_title = 0;
        } else {
            $website_meta_title = 1;
        }

        // event promotion email
        if ($request->event_promotion_email == null) {
            $event_promotion_email = 0;
        } else {
            $event_promotion_email = 1;
        }

        // twitter writer
        if ($request->twitter_writer == null) {
            $twitter_writer = 0;
        } else {
            $twitter_writer = 1;
        }

        // presentation content
        if ($request->presentation_content == null) {
            $presentation_content = 0;
        } else {
            $presentation_content = 1;
        }

        // ask question
        if ($request->ask_question == null) {
            $ask_question = 0;
        } else {
            $ask_question = 1;
        }

        // landing page
        if ($request->landing_page == null) {
            $landing_page = 0;
        } else {
            $landing_page = 1;
        }

        // google ads
        if ($request->google_ads == null) {
            $google_ads = 0;
        } else {
            $google_ads = 1;
        }

        // aida framework
        if ($request->aida == null) {
            $aida = 0;
        } else {
            $aida = 1;
        }

        // product review
        if ($request->product_review == null) {
            $product_review = 0;
        } else {
            $product_review = 1;
        }

        // welcome email
        if ($request->welcome_email == null) {
            $welcome_email = 0;
        } else {
            $welcome_email = 1;
        }

        // youtube video description
        if ($request->youtube_video_description == null) {
            $youtube_video_description = 0;
        } else {
            $youtube_video_description = 1;
        }

        // custom prompt
        if ($request->custom_prompt == null) {
            $custom_prompt = 0;
        } else {
            $custom_prompt = 1;
        }

        // generate by website url
        if ($request->generate_by_website_url == null) {
            $generate_by_website_url = 0;
        } else {
            $generate_by_website_url = 1;
        }

        // Recommended
        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        // AI Speech to Text
        if ($request->ai_speech_to_text == null) {
            $ai_speech_to_text = 0;
        } else {
            $ai_speech_to_text = 1;
        }

        // AI Code
        if ($request->ai_code == null) {
            $ai_code = 0;
        } else {
            $ai_code = 1;
        }

        // Additional Tools
        if ($request->additional_tools == null) {
            $additional_tools = 0;
        } else {
            $additional_tools = 1;
        }

        // Support
        if ($request->support == null) {
            $support = 0;
        } else {
            $support = 1;
        }

        // Recommended
        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        // Is Private?
        if ($request->is_private == null) {
            $is_private = 0;
        } else {
            $is_private = 1;
        }

        // Templates
        $templates = [];
        $templates['blog_outline'] = $blog_outline;
        $templates['blog_headline'] = $blog_headline;
        $templates['blog_description'] = $blog_description;
        $templates['blog_story_ideas'] = $blog_story_ideas;
        $templates['article_content'] = $article_content;
        $templates['paragraph'] = $paragraph;
        $templates['summarization'] = $summarization;
        $templates['product_name'] = $product_name;
        $templates['product_description'] = $product_description;
        $templates['startup_name'] = $startup_name;
        $templates['service_review'] = $service_review;
        $templates['youtube_video_titles'] = $youtube_video_titles;
        $templates['youtube_video_tags'] = $youtube_video_tags;
        $templates['youtube_video_outline'] = $youtube_video_outline;
        $templates['youtube_video_intro'] = $youtube_video_intro;
        $templates['youtube_video_ideas'] = $youtube_video_ideas;
        $templates['youtube_short_script'] = $youtube_short_script;
        $templates['write_for_me'] = $write_for_me;
        $templates['website_meta_description'] = $website_meta_description;
        $templates['website_meta_keywords'] = $website_meta_keywords;
        $templates['website_meta_title'] = $website_meta_title;
        $templates['event_promotion_email'] = $event_promotion_email;
        $templates['twitter_writer'] = $twitter_writer;
        $templates['presentation_content'] = $presentation_content;
        $templates['ask_question'] = $ask_question;
        $templates['landing_page'] = $landing_page;
        $templates['google_ads'] = $google_ads;
        $templates['aida'] = $aida;
        $templates['product_review'] = $product_review;
        $templates['welcome_email'] = $welcome_email;
        $templates['youtube_video_description'] = $youtube_video_description;
        $templates['custom_prompt'] = $custom_prompt;
        $templates['generate_by_website_url'] = $generate_by_website_url;

        // Save plan
        $plan = new Plan;
        $plan->is_private = $is_private;
        $plan->name = ucfirst($request->name);
        $plan->description = ucfirst($request->description);
        $plan->price = $request->price;
        $plan->validity = $request->validity;
        $plan->template_counts = $request->templates;
        $plan->templates = json_encode($templates);
        $plan->max_words = $request->words;
        $plan->max_images = $request->images;
        $plan->ai_speech_to_text = $ai_speech_to_text;
        $plan->ai_code = $ai_code;
        $plan->additional_tools = $additional_tools;
        $plan->recommended = $recommended;
        $plan->support = $support;
        $plan->save();

        return redirect()->route('admin.add.plan')->with('success', trans('New Plan Created Successfully!'));
    }

    // Edit Plan
    public function editPlan(Request $request, $id)
    {
        // Queries
        $id = $request->id;
        $plan_details = Plan::where('id', $id)->first();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        // Plan Checking
        if ($plan_details == null) {
            return view('errors.404');
        } else {
            // Available templates in single plan
            $availableTemplates = json_decode($plan_details->templates);
            return view('admin.pages.plans.edit', compact('plan_details', 'availableTemplates', 'settings', 'config'));
        }
    }

    // Update Plan
    public function updatePlan(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'plan_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'validity' => 'required',
            'templates' => 'required',
            'words' => 'required',
            'images' => 'required'
        ]);

        // blog outline
        if ($request->blog_outline == null) {
            $blog_outline = 0;
        } else {
            $blog_outline = 1;
        }

        // blog headline
        if ($request->blog_headline == null) {
            $blog_headline = 0;
        } else {
            $blog_headline = 1;
        }

        // blog description
        if ($request->blog_description == null) {
            $blog_description = 0;
        } else {
            $blog_description = 1;
        }

        // blog story ideas
        if ($request->blog_story_ideas == null) {
            $blog_story_ideas = 0;
        } else {
            $blog_story_ideas = 1;
        }

        // article content
        if ($request->article_content == null) {
            $article_content = 0;
        } else {
            $article_content = 1;
        }

        // paragraph
        if ($request->paragraph == null) {
            $paragraph = 0;
        } else {
            $paragraph = 1;
        }

        // summarization
        if ($request->summarization == null) {
            $summarization = 0;
        } else {
            $summarization = 1;
        }

        // product name
        if ($request->product_name == null) {
            $product_name = 0;
        } else {
            $product_name = 1;
        }

        // product description
        if ($request->product_description == null) {
            $product_description = 0;
        } else {
            $product_description = 1;
        }

        // startup name
        if ($request->startup_name == null) {
            $startup_name = 0;
        } else {
            $startup_name = 1;
        }

        // service review
        if ($request->service_review == null) {
            $service_review = 0;
        } else {
            $service_review = 1;
        }

        // youtube video titles
        if ($request->youtube_video_titles == null) {
            $youtube_video_titles = 0;
        } else {
            $youtube_video_titles = 1;
        }

        // youtube video tags
        if ($request->youtube_video_tags == null) {
            $youtube_video_tags = 0;
        } else {
            $youtube_video_tags = 1;
        }

        // youtube video outline
        if ($request->youtube_video_outline == null) {
            $youtube_video_outline = 0;
        } else {
            $youtube_video_outline = 1;
        }

        // youtube video intro
        if ($request->youtube_video_intro == null) {
            $youtube_video_intro = 0;
        } else {
            $youtube_video_intro = 1;
        }

        // youtube video ideas
        if ($request->youtube_video_ideas == null) {
            $youtube_video_ideas = 0;
        } else {
            $youtube_video_ideas = 1;
        }

        // youtube short script
        if ($request->youtube_short_script == null) {
            $youtube_short_script = 0;
        } else {
            $youtube_short_script = 1;
        }

        // write for me
        if ($request->write_for_me == null) {
            $write_for_me = 0;
        } else {
            $write_for_me = 1;
        }

        // website meta description
        if ($request->website_meta_description == null) {
            $website_meta_description = 0;
        } else {
            $website_meta_description = 1;
        }

        // website meta keywords
        if ($request->website_meta_keywords == null) {
            $website_meta_keywords = 0;
        } else {
            $website_meta_keywords = 1;
        }

        // website meta title
        if ($request->website_meta_title == null) {
            $website_meta_title = 0;
        } else {
            $website_meta_title = 1;
        }

        // event promotion email
        if ($request->event_promotion_email == null) {
            $event_promotion_email = 0;
        } else {
            $event_promotion_email = 1;
        }

        // twitter writer
        if ($request->twitter_writer == null) {
            $twitter_writer = 0;
        } else {
            $twitter_writer = 1;
        }

        // presentation content
        if ($request->presentation_content == null) {
            $presentation_content = 0;
        } else {
            $presentation_content = 1;
        }

        // ask question
        if ($request->ask_question == null) {
            $ask_question = 0;
        } else {
            $ask_question = 1;
        }

        // landing page
        if ($request->landing_page == null) {
            $landing_page = 0;
        } else {
            $landing_page = 1;
        }

        // google ads
        if ($request->google_ads == null) {
            $google_ads = 0;
        } else {
            $google_ads = 1;
        }

        // aida framework
        if ($request->aida == null) {
            $aida = 0;
        } else {
            $aida = 1;
        }

        // product review
        if ($request->product_review == null) {
            $product_review = 0;
        } else {
            $product_review = 1;
        }

        // welcome email
        if ($request->welcome_email == null) {
            $welcome_email = 0;
        } else {
            $welcome_email = 1;
        }

        // youtube video description
        if ($request->youtube_video_description == null) {
            $youtube_video_description = 0;
        } else {
            $youtube_video_description = 1;
        }

        // custom prompt
        if ($request->custom_prompt == null) {
            $custom_prompt = 0;
        } else {
            $custom_prompt = 1;
        }

        // generate by website url
        if ($request->generate_by_website_url == null) {
            $generate_by_website_url = 0;
        } else {
            $generate_by_website_url = 1;
        }

        // Recommended
        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        // AI Speech to Text
        if ($request->ai_speech_to_text == null) {
            $ai_speech_to_text = 0;
        } else {
            $ai_speech_to_text = 1;
        }

        // AI Code
        if ($request->ai_code == null) {
            $ai_code = 0;
        } else {
            $ai_code = 1;
        }

        // Additional Tools
        if ($request->additional_tools == null) {
            $additional_tools = 0;
        } else {
            $additional_tools = 1;
        }

        // Support
        if ($request->support == null) {
            $support = 0;
        } else {
            $support = 1;
        }

        // Recommended
        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        // Is Private?
        if ($request->is_private == null) {
            $is_private = 0;
        } else {
            $is_private = 1;
        }

        // Templates
        $templates = [];
        $templates['blog_outline'] = $blog_outline;
        $templates['blog_headline'] = $blog_headline;
        $templates['blog_description'] = $blog_description;
        $templates['blog_story_ideas'] = $blog_story_ideas;
        $templates['article_content'] = $article_content;
        $templates['paragraph'] = $paragraph;
        $templates['summarization'] = $summarization;
        $templates['product_name'] = $product_name;
        $templates['product_description'] = $product_description;
        $templates['startup_name'] = $startup_name;
        $templates['service_review'] = $service_review;
        $templates['youtube_video_titles'] = $youtube_video_titles;
        $templates['youtube_video_tags'] = $youtube_video_tags;
        $templates['youtube_video_outline'] = $youtube_video_outline;
        $templates['youtube_video_intro'] = $youtube_video_intro;
        $templates['youtube_video_ideas'] = $youtube_video_ideas;
        $templates['youtube_short_script'] = $youtube_short_script;
        $templates['write_for_me'] = $write_for_me;
        $templates['website_meta_description'] = $website_meta_description;
        $templates['website_meta_keywords'] = $website_meta_keywords;
        $templates['website_meta_title'] = $website_meta_title;
        $templates['event_promotion_email'] = $event_promotion_email;
        $templates['twitter_writer'] = $twitter_writer;
        $templates['presentation_content'] = $presentation_content;
        $templates['ask_question'] = $ask_question;
        $templates['landing_page'] = $landing_page;
        $templates['google_ads'] = $google_ads;
        $templates['aida'] = $aida;
        $templates['product_review'] = $product_review;
        $templates['welcome_email'] = $welcome_email;
        $templates['youtube_video_description'] = $youtube_video_description;
        $templates['custom_prompt'] = $custom_prompt;
        $templates['generate_by_website_url'] = $generate_by_website_url;

        // Update plan
        Plan::where('id', $request->plan_id)->update([
            'is_private' => $is_private, 'name' => ucfirst($request->name), 'description' => ucfirst($request->description),
            'price' => $request->price, 'validity' => $request->validity, 'template_counts' => $request->templates,
            'templates' => json_encode($templates), 'max_words' => $request->words, 'max_images' => $request->images, 'ai_speech_to_text' => $ai_speech_to_text, 'ai_code' => $ai_code,
            'additional_tools' => $additional_tools, 'recommended' => $recommended, 'support' => $support
        ]);

        return redirect()->route('admin.edit.plan', $request->plan_id)->with('success', trans('Plan Details Updated Successfully!'));
    }

    // Delete Plan
    public function deletePlan(Request $request)
    {
        // Get plan details
        $plan_details = Plan::where('id', $request->query('id'))->first();

        // Check status
        if ($plan_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // Update status
        Plan::where('id', $request->query('id'))->update(['status' => $status]);
        return redirect()->route('admin.index.plans')->with('success', trans('Plan Status Updated Successfully!'));
    }
}
