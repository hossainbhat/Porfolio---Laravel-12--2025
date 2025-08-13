<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // Logic for the index page
        return view('them.index');
    }

    public function about()
    {
        // Logic for the about page
        return view('them.about');
    }
    public function portfolio()
    {
        $data['portfolios'] = Project::where('status', 1)->latest()->paginate(6);
        return view('them.portfolio',$data);
    }
    public function blog()
    {
        $data['blogs'] = Blog::with('user')->where('status', 1)->latest()->paginate(6);
        return view('them.blog',$data);
    }

    public function blogSingle(Blog $blog)
    {
        $data['blog'] = $blog->load('user');
        return view('them.blog_single', $data);
    }

    public function contact(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            Contact::create($data);
            
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        }
        return view('them.contact');
    }
}
