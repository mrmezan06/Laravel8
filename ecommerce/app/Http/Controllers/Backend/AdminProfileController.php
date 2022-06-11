<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);

        return view('admin.admin_view', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);

        return view('admin.admin_view_edit', compact('editData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $data['profile_photo_path']= $fileName;
        }

        $data->save();

        return redirect()->route('admin.profile');
    }
}
