<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    const IMAGE_PATH = 'uploads/project/';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $project = new Project();
            $limit = 10;
            $offset = 0;
            $search = [];
            $where = [];
            $with = [];
            $join = [];
            $orderBy = [];

            if ($request->input('length')) {
                $limit = $request->input('length');
            }

            if ($request->input('order')[0]['column'] != 0) {
                $column_name = $request->input('columns')[$request->input('order')[0]['column']]['name'];
                $sort = $request->input('order')[0]['dir'];
                $orderBy[$column_name] = $sort;
            }

            if ($request->input('start')) {
                $offset = $request->input('start');
            }

            if ($request->input('search') && $request->input('search')['value'] != "") {
                $search['title'] = $request->input('search')['value'];
                $search['name'] = $request->input('search')['value'];
            }

            if ($request->input('where')) {
                $where = $request->input('where');
            }


            $project = $project->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($project);
        }
        return view('admin.project.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'name' => 'required',
                'clint' => 'required',
                'technology' => 'required',
                'link' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:1024',
            ]);

            $data = [
                'title' => $request->title,
                'name' => $request->name,
                'clint' => $request->clint,
                'technology' => $request->technology,
                'link' => $request->link,
                'status' => $request->status ? $request->status : 0,
            ];
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time() . '_' . rand(111, 99999) . '.' . $extension;
                    $image_tmp->move(self::IMAGE_PATH, $fileName);
                    $data['image'] = $fileName;
                }
            }
            Project::create($data);
            return sendSuccess('Successfully created !');
        } catch (\Exception $e) {
            DB::rollBack();
            return sendError($e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data['project'] = $project;
        return view('admin.project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        try {
           $request->validate([
                'title' => 'required',
                'name' => 'required',
                'clint' => 'required',
                'technology' => 'required',
                'link' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:1024',
            ]);

            $data = [
                'title' => $request->title,
                'name' => $request->name,
                'clint' => $request->clint,
                'technology' => $request->technology,
                'link' => $request->link,
                'status' => $request->status ? $request->status : 0,
            ];
            if ($request->hasFile('image')) {
                $logo = self::IMAGE_PATH . $project->image;
                if (file_exists($logo)) {
                    unlinkFile($logo);
                }
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time() . '_' . rand(111, 99999) . '.' . $extension;
                    $image_tmp->move(self::IMAGE_PATH, $fileName);
                    $data['image'] = $fileName;
                }
            }
            $project->update($data);
            return sendSuccess('Successfully Update!');
        } catch (\Exception $e) {
            DB::rollBack();
            return sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $logo = self::IMAGE_PATH . $project->image;
            if (file_exists($logo)) {
                unlinkFile($logo);
            }
            $project->delete();
            return sendMessage('Successfully Delete');
        } catch (\Exception $e) {
            return sendError($e->getMessage());
        }
    }
}
