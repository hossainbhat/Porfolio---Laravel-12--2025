<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    const IMAGE_PATH = 'uploads/photo/';
    const CV_IMAGE_PATH = 'uploads/cv/';
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $contact = new Contact();
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


            $contact = $contact->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($contact);
        }
        return view('admin.setting.index');
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return sendMessage('Successfully Delete');
        } catch (\Exception $e) {
            return sendError($e->getMessage());
        }
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = auth()->user()->id;
            $data = [
                'name'=>$request->name,
                'address'=>$request->address,
                'designation'=>$request->designation,
                'mobile'=>$request->mobile,
                'team'=>$request->team,
                'langages'=>$request->langages,
                'age'=>$request->age,
                'nationality'=>$request->nationality,
                'freelance'=>$request->freelance,
                'bio'=>$request->bio,
                'email'=>$request->email,
                'description'=>$request->description,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkdin'=>$request->linkdin,
                'github'=>$request->github,
                'years_of_experience'=>$request->years_of_experience,
                'complete_project'=>$request->complete_project,
                'happy_customer'=>$request->happy_customer,
                'number_of_award'=>$request->number_of_award,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'meta_keywords'=>$request->meta_keywords,
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
            if ($request->hasFile('fave_icon')) {
                $image_tmp = $request->file('fave_icon');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time() . '_' . rand(111, 99999) . '.' . $extension;
                    $image_tmp->move(self::IMAGE_PATH, $fileName);
                    $data['fave_icon'] = $fileName;
                }
            }
            if ($request->hasFile('cv')) {
                
                $image_tmp = $request->file('cv');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = time() . '_' . rand(111, 99999) . '.' . $extension;
                    $image_tmp->move(self::CV_IMAGE_PATH, $fileName);
                    $data['cv'] = $fileName;
                }
            }
            // dd($data);
            User::where(['id'=>auth()->user()->id])->update($data);
        }
        return view('admin.setting.profile');
    }

    public function chkPassword(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data);
        if (Hash::check($data['current_pwd'], auth()->user()->password)) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }

    //update password
    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Hash::check($data['current_pwd'], auth()->user()->password)) {

                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    User::where('id', auth()->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    return sendSuccess('updated Successfully!');
                } else {
                    return sendError("new Password & confirm password not match!");
                }
            } else {
                return sendError("Incorrect Current Password!");
            }
            return redirect()->back();
        }
    }
}
