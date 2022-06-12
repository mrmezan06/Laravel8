<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Auth;

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

        Session::flash('success', 'You successfully updated the profile.');

        return redirect()->route('admin.profile');
    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    
    public function AdminUpdateChangePassword(Request $request)
    {
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required'
        ]);

        $hashedPassword = Admin::find(1)->password;
        
            if($request->password_confirmation != $request->password)
            {
                Session::flash('warning', 'New Password and Confirm Password Must be same.');
                return redirect()->back();
            }

        if(hash::check($request->oldpassword, $hashedPassword))
        {
                $admin = Admin::find(1);
                $admin->password = Hash::make($request->password);
                $admin->save();
                Session::flash('success', 'You successfully updated the password.');
                return redirect()->route('admin.profile');
           
        }else
        {
            Session::flash('error', 'Wrong Password! Please Check Your Old Password.');
            return redirect()->back();
        }


        

        
    }
}

