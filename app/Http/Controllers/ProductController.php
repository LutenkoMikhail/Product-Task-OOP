<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->paginate = Config::get('constants.paginate.paginate_author_10');
    }

    public function index()
    {
        $products = Product::paginate($this->paginate);
        return view('welcome', [
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        return view('products.view',
            [
                'product' => $product
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

    public function store(ProductCreateRequest $request)
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function edit(Product $product)
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function update(ProductCreateRequest $request, Product $product)
    {

        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }

    public function delete(Product $product)
    {
        return view('sorry',
            [
                'nameClass' => __CLASS__,
                'nameMethod' => __METHOD__
            ]
        );
    }
}
