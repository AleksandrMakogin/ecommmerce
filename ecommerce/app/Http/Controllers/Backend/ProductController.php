<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Proudct;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class ProductController extends Controller
{
   public function AddProduct(){


       $categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories','brands'));
   }

    public function StoreProduct(Request $request){

        $request->validate([
            'file' => 'mimes:jpeg,png,jpg,zip,pdf|max:7000',
        ]);

        if ($files = $request->file('file')) {
            $destinationPath = 'upload/pdf'; // upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$digitalItem);
        }

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;




        $product_id = Proudct::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ru' => $request->product_name_ru,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ru' => str_replace(' ', '-', $request->product_name_ru),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ru' => $request->product_tags_ru,
            'product_size_en' => $request->product_size_en,
            'product_size_ru' => $request->product_size_ru,
            'product_color_en' => $request->product_color_en,
            'product_color_ru' => $request->product_color_ru,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ru' => $request->short_descp_ru,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ru' => $request->long_descp_ru,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,
            'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }
        ////////// Multiple Image Upload end ///////////

        $notification = array(
            'message' => 'Продукт добавлен успешно',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);


    } // end method

    public function ManageProduct(){

        $products = Proudct::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function EditProduct($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Proudct::findOrFail($id);
        return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','products','multiImgs'));
    }

    public function ProductDataUpdate(Request $request){

        $product_id = $request->id;

        Proudct::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ru' => $request->product_name_ru,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ru' => str_replace(' ', '-', $request->product_name_ru),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ru' => $request->product_tags_ru,
            'product_size_en' => $request->product_size_en,
            'product_size_ru' => $request->product_size_ru,
            'product_color_en' => $request->product_color_en,
            'product_color_ru' => $request->product_color_ru,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ru' => $request->short_descp_ru,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ru' => $request->long_descp_ru,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Продукт Обновлен без фото успешно',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);


    } // end method

    public function MultiImageUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);

        } // end foreach

        $notification = array(
            'message' => 'Фото обновлено успешно',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end mehtod

    /// Product Main Thambnail Update ///
    public function ThambnailImageUpdate(Request $request){

        $pro_id = $request->id;




        $image = $request->file('product_thambnail');
        if($image){
            $oldImage = $request->old_img;
            unlink($oldImage);
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
            $save_url = 'upload/products/thambnail/'.$name_gen;

            Proudct::findOrFail($pro_id)->update([
                'product_thambnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Главное фото изменено успешно',
                'alert-type' => 'info'
            );

        }else{
            $notification = array(
                'message' => 'Нет выбраного фото',
                'alert-type' => 'info'
            );
        }

        return redirect()->back()->with($notification);

    } // end method

    //// Multi Image Delete ////
    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method

    public function ProductInactive($id){
        Proudct::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Продукт активный',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id){
        Proudct::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Продукт не активный',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductDelete($id){
        $product = Proudct::findOrFail($id);
        unlink($product->product_thambnail);
        Proudct::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Продукт удален успешно',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// end method

    // product Stock
    public function ProductStock(){

        $products = Proudct::latest()->get();
        return view('backend.product.product_stock',compact('products'));
    }





}
