<?php

namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Support\Facades\Config;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->paginate = Config::get('constants.paginate.paginate_category_5');
    }

    public function index()
    {
        $categories = Category::paginate($this->paginate);
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category)
    {
        return view('categories.view',
            [
                'category' => $category
            ]
        );
    }

    public function create()
    {
        $categories = Category::all();
        return view('categories.create',
            [
                'categories' => $categories
            ]);
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = new \App\Category();
        $category->name = $request->name;
        if (!empty($request->selectcategory)) {
            $category->parent_id = $request->selectcategory;
        }
        if ($category->save()) {
            return redirect()->route('categories');
        }
        return redirect()->back();
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit',
            [
                'category' => $category,
                'categories' => $categories
            ]
        );
    }

    public function update(CategoryCreateRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->parent_id = null;
        if (!empty($request->selectcategory)) {
            $category->parent_id = $request->selectcategory;
        }
        if ($category->save()) {
            return redirect()->route('categories');
        }
        return redirect()->back();
    }

    public function delete(Category $category)
    {
        $category->products()->delete();
        $category->delete();
        return redirect()->route('categories');
    }
}
