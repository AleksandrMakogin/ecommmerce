<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){


        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view', compact('subcategories', 'categories'));
    }

    public function SubCategoryStore(Request  $request){

        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ru' => 'required',

        ],


            [
                'category_id.required' => 'Выберите катеогрию',
                'subcategory_name_en.required' => 'Заполните поле имя подкатегории на англ языке ',
                'subcategory_name_ru.required' => 'Заполните поле имя подкатегории на русс языке ',


            ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request ->subcategory_name_en,
            'subcategory_name_ru' => $request ->subcategory_name_ru,
            'subcategory_slug_en' => strtolower(str_replace('','-',$request ->subcategory_name_en)),
            'subcategory_slug_ru' => str_replace('','-',$request ->subcategory_name_ru),
        ]);
        $notification = array(
            'message' => 'Покатегория добавлена успешно',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public  function SubCategoryEdit($id){

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('categories','subcategories'));

    }

    public function SubCategoryUpdate(Request $request){

        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([

            'category_id' => $request->category_id,
            'subcategory_name_en' => $request ->subcategory_name_en,
            'subcategory_name_ru' => $request ->subcategory_name_ru,
            'subcategory_slug_en' => strtolower(str_replace('','-',$request ->subcategory_name_en)),
            'subcategory_slug_ru' => str_replace('','-',$request ->subcategory_name_ru),

        ]);
        $notification = array(
            'message' => 'Подкатегория обновлена успешно',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);

    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => ' Подкатегория  успешно удалена',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }


    // Методы Подкатегории1

    public function SubSubCategoryView(){


        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.subcategory.subsubcategory.subsubcategory_view', compact('subsubcategories', 'categories'));
    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }

    public function SubSubCategoryStore(Request $request){

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ru' => 'required',

        ],
            [
                'category_id.required' => 'Выберите катеогрию',
                'subcategory_id.required' => 'Выберите катеогрию',
                'subsubcategory_name_en.required' => 'Заполните поле имя подкатегории на англ языке ',
                'subsubcategory_name_ru.required' => 'Заполните поле имя подкатегории на русс языке ',

            ]
        );


        SubSubCategory::insert([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request ->subsubcategory_name_en,
            'subsubcategory_name_ru' => $request ->subsubcategory_name_ru,
            'subsubcategory_slug_en' => strtolower(str_replace('','-',$request ->subsubcategory_name_en)),
            'subsubcategory_slug_ru' => str_replace('','-',$request ->subsubcategory_name_ru),

        ]);
        $notification = array(
            'message' => 'Покатегория1 добавлена успешно',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function SubSubCategoryEdit($id){

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.subcategory.subsubcategory.subsubcategory_edit', compact('subsubcategories', 'categories', 'subcategories'));


    }

    public function SubSubCategoryUpdate(Request $request){

        $subsubcategory_id = $request->id;

        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request ->subsubcategory_name_en,
            'subsubcategory_name_ru' => $request ->subsubcategory_name_ru,
            'subsubcategory_slug_en' => strtolower(str_replace('','-',$request ->subsubcategory_name_en)),
            'subsubcategory_slug_ru' => str_replace('','-',$request ->subsubcategory_name_ru),
        ]);

        $notification = array(
            'message' => 'Покатегория1 обновлена успешно',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subsubcategory')->with($notification);

    }

    public function SubSubCategoryDelete($id){

        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Покатегория1  успешно удалена',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subsubcategory')->with($notification);


    }
}
