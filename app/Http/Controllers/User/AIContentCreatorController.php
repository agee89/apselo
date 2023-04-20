<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use App\Classes\AiTools;
use App\Models\Generate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AIContentCreatorController extends Controller
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

    // Show all AI Contents
    public function indexAllAiContent()
    {
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get User Generated contents
            $contents = Generate::where('generate_by', Auth::user()->id)->where('type', '!=', 'Speech to Text')->where('type', '!=', 'Code')->where('status', 1)->orderBy('updated_at', 'desc')->paginate(7);
            $settings = Setting::where('status', 1)->first();

            return view('user.pages.ai-content.index', compact('contents', 'settings'));
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Show all AI Contents
    public function indexNewAiContent()
    {
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check user used word count
            if ($usesWordsCount < (int)$max_words) {
                return view('user.pages.ai-content.pages.index', compact('active_plan'));
            } else {
                // Redirect
                return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Blog AI
    public function aiBlogOutline()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->blog_outline == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.blog-outline', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Blog AI
    public function aiBlogHeading()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->blog_headline == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.blog-heading', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Blog Description AI
    public function aiBlogDescription()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->blog_description == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.blog-description', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Blog Story Ideas AI
    public function aiBlogStoryIdeas()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->blog_story_ideas == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.blog-story-ideas', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Content creator
    public function aiContentCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->article_content == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.content', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Paragraph creator
    public function aiParagraphCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->paragraph == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.paragraph', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Summarization creator
    public function aiSummarizationCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->summarization == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.summarization', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Product name creator
    public function aiProductNameCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->product_name == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.product-name', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Product Description creator
    public function aiProductDescriptionCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->product_description == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.product-description', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Startup name creator
    public function aiStartUpNameCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->startup_name == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.startup-name', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Product Review creator
    public function aiProductReviewCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->product_review == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.product-review', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Service Review creator
    public function aiServiceReviewCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->service_review == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.service-review', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Youtube Video Title creator
    public function aiYoutubeTitleCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->youtube_video_titles == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.youtube-title', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Youtube Video Tags creator
    public function aiYoutubeTagsCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->youtube_video_tags == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.youtube-tags', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Youtube Video Outline creator
    public function aiYoutubeOutlineCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->youtube_video_outline == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.youtube-outline', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Youtube Video Intro creator
    public function aiYoutubeIntroCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->youtube_video_intro == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.youtube-intro', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Youtube Video Ideas creator
    public function aiYoutubeIdeasCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->youtube_video_ideas == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.youtube-ideas', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Youtube Video description creator
    public function aiYoutubeDescriptionCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->youtube_video_description == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.youtube-description', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI Youtube Video Shorts Script creator
    public function aiYoutubeShortsScriptCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->youtube_short_script == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.youtube-shorts', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Write for me" creator
    public function aiWriteMeCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->write_for_me == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.write-me', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Welcome Email" creator
    public function aiWelcomeEmailCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->welcome_email == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.welcome-email', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Website Meta Description" creator
    public function aiWebsiteMetaDescriptionCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->website_meta_description == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.website-meta-description', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Website Meta Keywords" creator
    public function aiWebsiteMetaKeywordsCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->website_meta_keywords == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.website-meta-keywords', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Website Meta Title" creator
    public function aiWebsiteMetaTitleCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->website_meta_title == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.website-meta-title', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Event Promotion Email" creator
    public function aiEventPromotionEmailCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->event_promotion_email == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.event-promotion-email', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Twitter Writer" creator
    public function aiTwitterWriterCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->twitter_writer == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.twitter-writer', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Aida Framework" creator
    public function aiAidaFrameworkCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->aida == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.aida-framework', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Presentation" creator
    public function aiPresentationCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->presentation_content == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.presentation', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Ask Question" creator
    public function aiAskQuestionCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->ask_question == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.ask-question', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Landing Page" creator
    public function aiLandingPageCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->landing_page == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.landing-page', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Google Ads" creator
    public function aiGoogleAdsCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->google_ads == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.google-ads', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Custom Prompt" creator
    public function aiCustomPromptCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->custom_prompt == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.custom-prompt', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Create AI "Generate by Website URL" creator
    public function aiGenerateByWebsiteUrlCreator()
    {
        // Queries
        $config = Config::get();
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check plan
        if ($active_plan != null) {
            // Get user used word count
            $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check maximum words
            $max_words = $plan_details->max_words;

            // Check tool
            if (json_decode($active_plan->templates)->generate_by_website_url == 1) {
                // Check user used word count
                if ($usesWordsCount < (int)$max_words) {
                    return view('user.pages.ai-content.pages.generate-by-website-url', compact('config'));
                } else {
                    // Redirect
                    return redirect()->route('user.all.ai.content')->with('failed', trans('Maximum words limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                return redirect()->route('user.all.ai.content')->with('failed', trans('This is a premium tool. If you want to access this tool, you need a premium plan.'));
            }
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Generate content
    public function generateAiContent(Request $request)
    {
        // Get user used word count
        $usesWordsCount = Generate::where('generate_by', Auth::user()->id)->sum('word_count');

        // Get plan details
        $plan = User::where('id', Auth::user()->id)->first();
        $plan_details = json_decode($plan->plan_details);

        // Check maximum words
        $max_words = $plan_details->max_words;

        if ($usesWordsCount < (int)$max_words) {
            // Generate AI Content
            $tool = new AiTools;
            $tool->generate($request);

            // Check result
            if ($tool->result != null) {
                // Parameters
                $level = (float)$request->level;
                $maxTokens = $request->max_length;
                $topP = 1.0;
                $frequencyPenalty = 0.0;
                $presencePenalty = 0.0;

                // Result
                $generateId = random_int(000000000000001, 99999999999999);

                // Settings Parameters
                $settings = [];
                $settings['lang'] = $request->lang;
                $settings['max_length'] = $request->max_length;
                $settings['results'] = $request->results;
                $settings['level'] = $level;
                $settings['max_tokens'] = $maxTokens;
                $settings['top_p'] = $topP;
                $settings['frequency_penalty'] = $frequencyPenalty;
                $settings['presence_penalty'] = $presencePenalty;


                // Save Generate Content
                $saveContent = new Generate();
                $saveContent->generate_id = $generateId;
                $saveContent->generate_by = Auth::user()->id;
                $saveContent->name = $request->name;
                $saveContent->type = $request->type;
                $saveContent->lang = $request->lang;
                $saveContent->content = $tool->result;
                $saveContent->word_count = $this->utf8_str_word_count($tool->result);
                $saveContent->parameters = json_encode($settings);
                $saveContent->save();

                return response()->json([$tool->result, $generateId], 200);
            } else {
                return response()->json($tool->result, 200);
            }
        } else {
            // Redirect
            return response()->json(404);
        }
    }

    // View generate content
    public function viewAiContent($generateId)
    {
        // Get single content data
        $content = Generate::where('generate_id', $generateId)->where('generate_by', Auth::user()->id)->first();

        // Check content
        if (isset($content)) {
            return view('user.pages.ai-content.view', compact('content'));
        } else {
            return redirect()->route('user.all.ai.content')->with('failed', trans('Wrong content ID.'));
        }
    }

    // Edit generate content
    public function editAiContent($generateId)
    {
        // Get single content data
        $content = Generate::where('generate_id', $generateId)->where('generate_by', Auth::user()->id)->first();
        $config = Config::get();

        // Check content
        if (isset($content)) {
            return view('user.pages.ai-content.edit', compact('content', 'config'));
        } else {
            return redirect()->route('user.all.ai.content')->with('failed', trans('Wrong content ID.'));
        }
    }

    // Update generate content
    public function updateAiContent(Request $request)
    {
        // Update single content data
        Generate::where('generate_id', $request->generateId)->where('generate_by', Auth::user()->id)->update([
            'content' => $request->result
        ]);

        return redirect()->route('user.edit.ai.content', $request->generateId)->with('success', trans('Updated!'));
    }

    // Delete generate content
    public function deleteAiContent(Request $request)
    {
        $content = Generate::where('generate_id', $request->query('id'))->where('generate_by', Auth::user()->id)->first();

        // Check content
        if (isset($content)) {
            // Delete single content data
            Generate::where('generate_id', $request->query('id'))->where('generate_by', Auth::user()->id)->update([
                'status' => 0
            ]);

            return redirect()->route('user.all.ai.content')->with('success', trans('Deleted!'));
        } else {
            return redirect()->route('user.all.ai.content')->with('failed', trans('Wrong content ID.'));
        }
    }

    // Export docs
    public function exportDocsAiContent($generateId)
    {
        // Get single content data
        $content = Generate::where('generate_id', $generateId)->where('generate_by', Auth::user()->id)->first();

        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment; Filename=' . $content->name . '.doc'
        );

        return response()->make(view('user.pages.ai-content.includes.export-doc', compact('content')), 200, $headers);
    }


    // Word count
    function utf8_str_word_count($string, $format = 0, $charlist = null)
    {
        if ($charlist === null) {
            $regex = '/\\pL[\\pL\\p{Mn}\'-]*/u';
        } else {
            $split = array_map(
                'preg_quote',
                preg_split('//u', $charlist, -1, PREG_SPLIT_NO_EMPTY)
            );
            $regex = sprintf(
                '/(\\pL|%1$s)([\\pL\\p{Mn}\'-]|%1$s)*/u',
                implode('|', $split)
            );
        }
        switch ($format) {
            default:
            case 0:
                // For PHP >= 5.4.0 this is fine:
                return preg_match_all($regex, $string);

                // For PHP < 5.4 it's necessary to do this:
                // $results = null;
                // return preg_match_all($regex, $string, $results);
            case 1:
                $results = null;
                preg_match_all($regex, $string, $results);
                return $results[0];
            case 2:
                $results = null;
                preg_match_all($regex, $string, $results, PREG_OFFSET_CAPTURE);
                return empty($results[0])
                    ? array()
                    : array_combine(
                        array_map('end', $results[0]),
                        array_map('reset', $results[0])
                    );
        }
    }
}
