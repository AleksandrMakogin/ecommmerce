<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminUserController extends Controller
{
    public function AllAdminRole(){

        $adminuser = Admin::where('type',2)->latest()->get();
        return view('backend.role.admin_role_all',compact('adminuser'));

    } // end method

    public function AddAdminRole(){
        return view('backend.role.admin_role_create');
    }



    public function StoreAdminRole(Request $request){
        $admin_id = $request->id;
        $save_url = Admin::find($admin_id);
        $file = $request->file('profile_photo_path');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('upload/admin_images'),$filename);
        $save_url['profile_photo_path'] = $filename;



        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brands' => $request->brand,
            'category' => $request->category,
            'products' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'return' => $request->returnorder,
            'review' => $request->review,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'profile_photo_path' => $filename,
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Админ-Пользователь создан успешно',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin.user')->with($notification);

    } // end method

    public function EditAdminRole($id){

        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit',compact('adminuser'));

    } // end method
    public function UpdateAdminRole(Request $request){

        $admin_id = $request->id;
//        $old_img = $request->old_image;


        $save_url = Admin::find($admin_id);

        if ($request->file('profile_photo_path')) {

//            unlink($old_img);
//            $image = $request->file('profile_photo_path');
//            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
//            Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
//            $save_url = 'upload/admin_images/'.$name_gen;

//            if($request->file('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                @unlink(public_path('upload/admin_images/'. $save_url->profile_photo_path));
                $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('upload/admin_images'),$filename);
                $save_url['profile_photo_path'] = $filename;

            $save_url->save();

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'brands' => $request->brand,
                'category' => $request->category,
                'products' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return' => $request->returnorder,
                'review' => $request->review,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,
                'profile_photo_path' => $filename,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Админ-Пользователь обновлен успешно',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);

        }else{

            Admin::findOrFail($admin_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'brands' => $request->brand,
                'category' => $request->category,
                'products' => $request->product,
                'slider' => $request->slider,
                'coupons' => $request->coupons,
                'shipping' => $request->shipping,
                'orders' => $request->orders,
                'stock' => $request->stock,
                'reports' => $request->reports,
                'alluser' => $request->alluser,
                'blog' => $request->blog,
                'setting' => $request->setting,
                'return' => $request->returnorder,
                'review' => $request->review,
                'adminuserrole' => $request->adminuserrole,
                'type' => 2,

                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Админ-Пользователь обновлен успешно',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);

        } // end else

    } // end method

    public function DeleteAdminRole($id){

        $adminimg = Admin::findOrFail($id);


        @unlink(public_path('upload/admin_images/'. $adminimg->profile_photo_path));


        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end method



}
