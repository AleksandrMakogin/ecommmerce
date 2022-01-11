<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;


class BrendController extends Controller
{
       public function BrandView(){
           $brands = Brand::latest()->get();

           return view('backend.brand.brand_view', compact('brands'));
       }

       public function BrandStore(Request $request){

           $request->validate([
              'brand_name_en' => 'required',
               'brand_name_ru' => 'required',
               'brand_image' => 'required|mimes:jpeg,png,jpg',
               ],

           [
               'brand_name_en.required' => 'Заполните поле имя бренда на англ языке ',
               'brand_name_ru.required' => 'Заполните поле имя бренда на русс языке ',
               'brand_image.required' => 'Заполните поле фото бренда  ',
               'brand_image.mimes' => ' формат фото должен быть jpeg,png'

               ]);

           $image = $request->file('brand_image');
           $nam_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save('upload/brand/'.$nam_gen);
           $save_url = 'upload/brand/'. $nam_gen;

           Brand::insert([
               'brand_name_en' => $request ->brand_name_en,
               'brand_name_ru' => $request ->brand_name_ru,
               'brand_slug_en' => strtolower(str_replace('','-',$request ->brand_name_en)),
               'brand_slug_ru' => str_replace('','-',$request ->brand_name_ru),
               'brand_image' =>  $save_url,

           ]);
           $notification = array(
               'message' => 'Бренд добавлен успешно',
               'alert-type' => 'success'
           );

           return redirect()->back()->with($notification);

       }

       public function BrandEdit( $id){

           $brands = Brand::findOrFail($id);
           return view('backend.brand.brand_edit',compact('brands'));

       }

       public function BrandUpdate(Request $request){

           $brend_id = $request->id;
           $old_img = $request->old_image;

           $request->validate([

               'brand_image' => 'mimes:jpeg,png,jpg,svg',
           ],

               [
                   'brand_image.mimes' => ' формат фото должен быть jpeg,png,jpg,svg',

               ]);



           if($request->file('brand_image')){
               unlink($old_img);
               $image = $request->file('brand_image');
               $nam_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
               Image::make($image)->resize(300,300)->save('upload/brand/'.$nam_gen);
               $save_url = 'upload/brand/'. $nam_gen;

               Brand::findOrFail($brend_id)->update([
                   'brand_name_en' => $request ->brand_name_en,
                   'brand_name_ru' => $request ->brand_name_ru,
                   'brand_slug_en' => strtolower(str_replace('','-',$request ->brand_name_en)),
                   'brand_slug_ru' => str_replace('','-',$request ->brand_name_ru),
                   'brand_image' =>  $save_url,

               ]);
               $notification = array(
                   'message' => 'Бренд обновлен успешно',
                   'alert-type' => 'info'
               );

               return redirect()->route('all.brands')->with($notification);
           }else{
               Brand::findOrFail($brend_id)->update([
                   'brand_name_en' => $request ->brand_name_en,
                   'brand_name_ru' => $request ->brand_name_ru,
                   'brand_slug_en' => strtolower(str_replace('','-',$request ->brand_name_en)),
                   'brand_slug_ru' => str_replace('','-',$request ->brand_name_ru),


               ]);
               $notification = array(
                   'message' => 'Бренд обновлен успешно',
                   'alert-type' => 'info'
               );

               return redirect()->route('all.brands')->with($notification);
           }

       }

       public function BrandDelete($id){

           $brand = Brand::findOrfail($id);
           $img = $brand->brand_image;
           unlink($img);

           Brand::findOrFail($id)->delete();
           $notification = array(
               'message' => 'Бренд успешно удален',
               'alert-type' => 'info'
           );

           return redirect()->route('all.brands')->with($notification);
       }
}
