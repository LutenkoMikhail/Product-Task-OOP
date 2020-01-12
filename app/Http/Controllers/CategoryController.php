<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CategoryController extends Controller
{
    private $paginate;

    public function __construct()
    {
        $this->paginate = Config::get('constants.paginate.paginate_category_5');
    }

    public function index()
    {
        $categories = Category::paginate($this->paginate);
        dd($categories)
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category)
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function create()
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function store(CategoryCreateRequest $request)
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function edit(Category $category)
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function update(CategoryCreateRequest $request, Category $category)
    {

        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function delete(Category $category)
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

}
