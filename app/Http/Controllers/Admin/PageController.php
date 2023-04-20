<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Config;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;

class PageController extends Controller
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

    //  Pages
    public function index()
    {
        // Static pages
        $pages = Page::where('slug', 'home')->orWhere('slug', 'features')->orWhere('slug', 'tools')->orWhere('slug', 'about')->orWhere('slug', 'contact')
        ->orWhere('slug', 'faq')->orWhere('slug', 'pricing')->orWhere('slug', 'privacy-policy')
        ->orWhere('slug', 'refund-policy')->orWhere('slug', 'terms-and-conditions')->groupBy('slug')->get(DB::raw('count(*) as total, pages.*'));
        // Custom pages
        $custom_pages = Page::where('name', 'Custom Page')->get();
        
        $settings = Setting::first();
        $config = Config::get();

        // View
        return view('admin.pages.pages.index', compact('pages', 'custom_pages', 'settings', 'config'));
    }

    // Add page
    public function addPage()
    {
        // Queries
        $config = Config::get();
        
        // View
        return view('admin.pages.pages.add', compact('config'));
    }

    // Save page
    public function savePage(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
            'page_title' => 'required',
            'keywords' => 'required',
            'description' => 'required'
        ]);

        // Update page
        $page = new Page();
        $page->name = $request->name;
        $page->title = ucfirst($request->title);
        $page->slug = $request->slug;
        $page->body = Purifier::clean($request->body);
        $page->page_title = ucfirst($request->page_title);
        $page->description = ucfirst($request->description);
        $page->keywords = $request->keywords;
        $page->save();

        return redirect()->route('admin.pages')->with('success', trans('Page Saved Successfully!'));
    }

    // Edit custom page
    public function editCustomPage($id)
    {
        // Get page details
        $page = Page::where('id', $id)->first();
        $settings = Setting::first();
        $config = Config::get();

        // View
        return view('admin.pages.pages.custom-edit', compact('page', 'settings', 'config'));
    }

    // Edit page
    public function editPage($id)
    {
        // Get page details
        $sections = Page::where('slug', $id)->get();
        $settings = Setting::first();
        $config = Config::get();

        // View
        return view('admin.pages.pages.edit', compact('sections', 'settings', 'config'));
    }

    // Update page
    public function updatePage(Request $request, $id)
    {
        // Update page
        $sections = Page::where('slug', $id)->get();
        for ($i = 0; $i < count($sections); $i++) {
            $safe_section_content = $request->input('section' . $i);
            Page::where('slug', $id)->where('id', $sections[$i]->id)->update(['page_title' => ucfirst($request->page_title), 'description' => ucfirst($request->description), 'keywords' => $request->keywords]);
            Page::where('slug', $id)->where('id', $sections[$i]->id)->update(['body' => ucfirst($safe_section_content)]);
        }

        // SEO
        Page::where('slug', $id)->update(['page_title' => $request->page_title]);
        Page::where('slug', $id)->update(['description' => $request->description]);
        Page::where('slug', $id)->update(['keywords' => $request->keywords]);

        // Page redirect
        return redirect()->route('admin.pages')->with('success', trans('Website Content Updated Successfully!'));
    }

    // Update custom page
    public function updateCustomPage(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'page_title' => 'required',
            'keywords' => 'required',
            'description' => 'required'
        ]);

        // Update page
        $page = Page::findOrFail($request->page_id);
        $page->title = ucfirst($request->title);
        $page->slug = $request->slug;
        $page->body = Purifier::clean($request->body);
        $page->page_title = ucfirst($request->page_title);
        $page->description = ucfirst($request->description);
        $page->keywords = $request->keywords;
        $page->save();

        return redirect()->route('admin.pages')->with('success', trans('Page Updated Successfully!'));
    }

    // Status Page
    public function statusPage(Request $request)
    {
        // Get plan details
        $page_details = Page::where('id', $request->query('id'))->first();

        // Check status
        if ($page_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // Update status
        Page::where('id', $request->query('id'))->update(['status' => $status]);
        return redirect()->route('admin.pages')->with('success', trans('Page Status Updated Successfully!'));
    }

    // Disable Page
    public function disablePage(Request $request)
    {
        // Get plan details
        $page_details = Page::where('slug', $request->query('id'))->first();

        // Check status
        if ($page_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // Update status
        Page::where('slug', $request->query('id'))->update(['status' => $status]);
        return redirect()->route('admin.pages')->with('success', trans('Page Status Updated Successfully!'));
    }

    // Delete Page
    public function deletePage(Request $request)
    {
        // Update status
        Page::where('id', $request->query('id'))->delete();
        return redirect()->route('admin.pages')->with('success', trans('Page Deleted Successfully!'));
    }
}
