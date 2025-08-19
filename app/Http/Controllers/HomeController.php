<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        $data['total_project'] = Project::count();
        $data['total_blog'] = Blog::count();
        $data['total_skill'] = Skill::count();
        $data['total_contact'] = Contact::count();
        $data['contacts'] = Contact::latest()->take(10)->get();
        return view('admin.dashboard',$data);
    }
}
