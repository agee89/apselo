<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    // plans
    public function index()
    {
        // Plans
        $plans = Plan::where('status', 1)->where('is_private', '0')->get();

        // Get access templates
        $access_templates = "";
        for ($i = 0; $i < count($plans); $i++) {
            if (json_decode($plans[$i]->templates)->blog_outline == 1) {
                $plans[$i]->access_templates .= 'Blog Outline, ';
            }
            if (json_decode($plans[$i]->templates)->blog_headline == 1) {
                $plans[$i]->access_templates .= 'Blog Headline, ';
            }
            if (json_decode($plans[$i]->templates)->blog_description == 1) {
                $plans[$i]->access_templates .= 'Blog Description, ';
            }
            if (json_decode($plans[$i]->templates)->blog_story_ideas == 1) {
                $plans[$i]->access_templates .= 'Blog Story Ideas, ';
            }
            if (json_decode($plans[$i]->templates)->article_content == 1) {
                $plans[$i]->access_templates .= 'Article Content, ';
            }
            if (json_decode($plans[$i]->templates)->paragraph == 1) {
                $plans[$i]->access_templates .= 'Paragraph, ';
            }
            if (json_decode($plans[$i]->templates)->summarization == 1) {
                $plans[$i]->access_templates .= 'Summarization, ';
            }
            if (json_decode($plans[$i]->templates)->product_name == 1) {
                $plans[$i]->access_templates .= 'Product Name, ';
            }
            if (json_decode($plans[$i]->templates)->product_description == 1) {
                $plans[$i]->access_templates .= 'Product Description, ';
            }
            if (json_decode($plans[$i]->templates)->startup_name == 1) {
                $plans[$i]->access_templates .= 'Startup Name, ';
            }
            if (json_decode($plans[$i]->templates)->service_review == 1) {
                $plans[$i]->access_templates .= 'Service Review, ';
            }
            if (json_decode($plans[$i]->templates)->youtube_video_titles == 1) {
                $plans[$i]->access_templates .= 'Youtube Video Titles, ';
            }
            if (json_decode($plans[$i]->templates)->youtube_video_tags == 1) {
                $plans[$i]->access_templates .= 'Youtube Video Tags, ';
            }
            if (json_decode($plans[$i]->templates)->youtube_video_outline == 1) {
                $plans[$i]->access_templates .= 'Youtube Video Outline, ';
            }
            if (json_decode($plans[$i]->templates)->youtube_video_intro == 1) {
                $plans[$i]->access_templates .= 'Youtube Video Intro, ';
            }
            if (json_decode($plans[$i]->templates)->youtube_video_ideas == 1) {
                $plans[$i]->access_templates .= 'Youtube Video Ideas, ';
            }
            if (json_decode($plans[$i]->templates)->youtube_short_script == 1) {
                $plans[$i]->access_templates .= 'Youtube Short Script, ';
            }
            if (json_decode($plans[$i]->templates)->write_for_me == 1) {
                $plans[$i]->access_templates .= 'Write For Me, ';
            }
            if (json_decode($plans[$i]->templates)->website_meta_description == 1) {
                $plans[$i]->access_templates .= 'Website Meta Description, ';
            }
            if (json_decode($plans[$i]->templates)->website_meta_keywords == 1) {
                $plans[$i]->access_templates .= 'Website Meta Keywords, ';
            }
            if (json_decode($plans[$i]->templates)->website_meta_title == 1) {
                $plans[$i]->access_templates .= 'Website Meta Title, ';
            }
            if (json_decode($plans[$i]->templates)->event_promotion_email == 1) {
                $plans[$i]->access_templates .= 'Event Promotion Email, ';
            }
            if (json_decode($plans[$i]->templates)->twitter_writer == 1) {
                $plans[$i]->access_templates .= 'Twitter Writer, ';
            }
            if (json_decode($plans[$i]->templates)->presentation_content == 1) {
                $plans[$i]->access_templates .= 'Presentation Content, ';
            }
            if (json_decode($plans[$i]->templates)->ask_question == 1) {
                $plans[$i]->access_templates .= 'Ask a Question, ';
            }
            if (json_decode($plans[$i]->templates)->landing_page == 1) {
                $plans[$i]->access_templates .= 'Landing Page, ';
            }
            if (json_decode($plans[$i]->templates)->google_ads == 1) {
                $plans[$i]->access_templates .= 'Google Ads, ';
            }
            if (json_decode($plans[$i]->templates)->aida == 1) {
                $plans[$i]->access_templates .= 'AIDA Framework, ';
            }
            if (json_decode($plans[$i]->templates)->product_review == 1) {
                $plans[$i]->access_templates .= 'Product Review, ';
            }
            if (json_decode($plans[$i]->templates)->welcome_email == 1) {
                $plans[$i]->access_templates .= 'Welcome Email, ';
            }
            if (json_decode($plans[$i]->templates)->youtube_video_description == 1) {
                $plans[$i]->access_templates .= 'Youtube Video Description, ';
            }
            if (json_decode($plans[$i]->templates)->generate_by_website_url == 1) {
                $plans[$i]->access_templates .= 'Generate By Website URL';
            }
        }

        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();
        $currency = Currency::where('iso_code', $config[1]->config_value)->first();

        // Current user plan details
        $free_plan = Transaction::where('user_id', Auth::user()->id)->where('transaction_amount', '0')->count();

        $plan = User::where('id', Auth::user()->id)->first();
        $active_plan = json_decode($plan->plan_details);

        // Initial remaining days
        $remaining_days = 0;

        // Check plan
        if (isset($active_plan)) {
            $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
            $current_date = Carbon::now();

            // Remaining days
            $remaining_days = $current_date->diffInDays($plan_validity, false);
        }

        return view('user.pages.plans.index', compact('plans', 'settings', 'currency', 'active_plan', 'remaining_days', 'config', 'free_plan'));
    }
}
