<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    public function CategoryView(){

        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request){

        $request->validate([
            'category_name_en' => 'required',
            'category_name_ru' => 'required',
            'category_icon' => 'required'
        ],


            [
                'category_name_en.required' => 'Заполните поле имя категории на англ языке ',
                'category_name_ru.required' => 'Заполните поле имя категории на русс языке ',
                'category_icon.required' => 'Заполните поле Icon категории   ',

            ]);

        Category::insert([
            'category_name_en' => $request ->category_name_en,
            'category_name_ru' => $request ->category_name_ru,
            'category_slug_en' => strtolower(str_replace('','-',$request ->category_name_en)),
            'category_slug_ru' => str_replace('','-',$request ->category_name_ru),
            'category_icon' =>  $request->category_icon,

        ]);
        $notification = array(
            'message' => 'Категория добавлена успешно',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function CategoryEdit($id){

        $categories = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('categories'));

    }

    public function CategoryUpdate(Request $request,$id){

//        $category_id = $request->id;

        Category::findOrFail($id)->update([
            'category_name_en' => $request ->category_name_en,
            'category_name_ru' => $request ->category_name_ru,
            'category_slug_en' => strtolower(str_replace('','-',$request ->category_name_en)),
            'category_slug_ru' => str_replace('','-',$request ->category_name_ru),
            'category_icon' =>  $request->category_icon,

        ]);
        $notification = array(
            'message' => 'Категория обновлена успешно',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);

    }


    public function CategoryDelete($id){



        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Категория  успешно удалена',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);

    }
}
