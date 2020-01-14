<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
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
        return view('products.index', [
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
        $categories = Category::all();
        $authors = Author::all();
        return view('products.create',
            [
                'categories' => $categories,
                'authors' => $authors
            ]);
    }

    public function store(ProductCreateRequest $request)
    {
//        dd($request);
        {
            $pathThumbnail = $request->thumbnail->store(
                "/images/products/{$request->sku}",
                'public'
            );

            $product = new \App\Product();
            $product->title = $request->title;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->thumbnail = $pathThumbnail;
            $product->author_id = $request->selectauthor;
//            dd($product);

            if ($product->save()) {
                foreach ($request->selectcategory as $categoryID) {
                    $product->category()->attach(
                        $categoryID
                    );
                }

                if (!empty($request->productgalleries)) {
                    foreach ($request->productgalleries as $productgallery) {
                        $pathProductGallery = $productgallery->store(
                            "/images/products/{$request->sku}",
                            'public'
                        );
                        $product->galleries()->attach(
                            $pathProductGallery
                        );
                    }
                }
            }
            return redirect()->route('products');
        }
        return redirect()->back();
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
