<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $skills = new Skill();
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
            }

            if ($request->input('where')) {
                $where = $request->input('where');
            }


            $skills = $skills->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($skills);
        }
        return view('admin.skill.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'percentage' => 'required',
            ]);

            $data = [
                'title' => $request->title,
                'percentage' => $request->percentage,
                'status' => $request->status ? $request->status : 0,
            ];
            Skill::create($data);
            return sendSuccess('Successfully created !');
        } catch (\Exception $e) {
            DB::rollBack();
            return sendError($e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        $data['skill'] = $skill;
        return view('admin.skill.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        try {
            $request->validate([
                'title' => 'required',
                'percentage' => 'required',
            ]);

            $data = [
                'title' => $request->title,
                'percentage' => $request->percentage,
                'status' => $request->status ? $request->status : 0,
            ];
            $skill->update($data);
            return sendSuccess('Successfully Update!');
        } catch (\Exception $e) {
            DB::rollBack();
            return sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        try {
            $skill->delete();
            return sendMessage('Successfully Delete');
        } catch (\Exception $e) {
            return sendError($e->getMessage());
        }
    }
}
