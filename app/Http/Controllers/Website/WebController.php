<?php

namespace App\Http\Controllers\Website;

use App\Models\Page;
use App\Models\Plan;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\IpAddress;
use App\Classes\NonStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class WebController extends Controller
{
    // Web Index
    public function webIndex()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Plans
            $page = Page::where('slug', 'home')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $plans = Plan::where('status', 1)->where('is_private', '0')->get();
                $config = Config::get();
                $currency = Currency::where('iso_code', $config['1']->config_value)->first();
                $setting = Setting::where('status', 1)->first();

                // Check plan for free
                $planPrices = [];
                for ($j = 0; $j < count($plans); $j++) {
                    $planPrices[$j] = $plans[$j]->price;
                }

                // Credit card required
                $requiredCreditCard = false;
                if (in_array("0.00", $planPrices)) {
                    $requiredCreditCard = true;
                }

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                // view
                return view("website.index", compact('plans', 'config', 'currency', 'setting', 'requiredCreditCard'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web Tools 
    public function webTools()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'tools')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', trans('Tools'), 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.tools", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web Features 
    public function webFeatures()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'features')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', trans('Features'), 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.features", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web About 
    public function webAbout()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'about')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_titlen);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.about", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web Pricing
    public function webPricing()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Plans
            $page = Page::where('slug', 'pricing')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $plans = Plan::where('status', 1)->where('is_private', '0')->get();
                $config = Config::get();
                $currency = Currency::where('iso_code', $config['1']->config_value)->first();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.pricing", compact('plans', 'config', 'currency', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web Contact
    public function webContact()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'contact')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.contact", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web FAQs
    public function webFAQ()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'faq')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.faq", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web Privacy
    public function webPrivacy()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'privacy-policy')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.privacy", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web Refund
    public function webRefund()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'refund-policy')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.refund", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Web Terms
    public function webTerms()
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Queries
            $page = Page::where('slug', 'terms-and-conditions')->where('status', 1)->get();

            // Check page
            if (!$page->isEmpty()) {
                $config = Config::get();
                $setting = Setting::where('status', 1)->first();

                // Seo Tools
                SEOTools::setTitle($page[0]->page_title);
                SEOTools::setDescription($page[0]->description);

                SEOMeta::setTitle($page[0]->page_title);
                SEOMeta::setDescription($page[0]->description);
                SEOMeta::addMeta('article:section', $page[0]->name . ' - ' . $page[0]->description, 'property');
                SEOMeta::addKeyword([$page[0]->keywords]);

                OpenGraph::setTitle($page[0]->page_title);
                OpenGraph::setDescription($page[0]->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page[0]->page_title);
                JsonLd::setDescription($page[0]->description);
                JsonLd::addImage(asset($setting->site_logo));

                return view("website.pages.terms", compact('config', 'setting'));
            } else {
                abort(404);
            }
        } else {
            return redirect('/login');
        }
    }

    // Custom pages
    public function customPage($id)
    {
        // Queries
        $config = Config::get();

        // Check website
        if ($config[43]->config_value == "yes") {
            // Get page details
            $page = Page::where('slug', $id)->where('status', 1)->first();

            $config = Config::get();
            $setting = Setting::where('status', 1)->first();

            if (!empty($page)) {
                // Seo Tools
                SEOTools::setTitle($page->page_title);
                SEOTools::setDescription($page->description);

                SEOMeta::setTitle($page->page_title);
                SEOMeta::setDescription($page->description);
                SEOMeta::addMeta('article:section', $page->name, 'property');
                SEOMeta::addKeyword([$page->keywords]);

                OpenGraph::setTitle($page->page_title);
                OpenGraph::setDescription($page->description);
                OpenGraph::setUrl(URL::full());
                OpenGraph::addImage([asset($setting->site_logo), 'size' => 300]);

                JsonLd::setTitle($page->page_title);
                JsonLd::setDescription($page->description);
                JsonLd::addImage(asset($setting->site_logo));

                // View page
                return view("website.pages.custom-page", compact('page', 'config', 'setting'));
            } else {
                return abort(404);
            }
        } else {
            return redirect('/login');
        }
    }
}
