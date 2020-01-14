<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\ProductGallery;
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
                        $gallery = new \App\ProductGallery();
                        $gallery->image_path = $pathProductGallery;
                        $gallery->product_id = $product->id;
                        $gallery->save();
                    }
                }
            }
            return redirect()->route('products');
        }
        return redirect()->back();
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $authors = Author::all();

        return view('products.edit',
            [
                'product' => $product,
                'categories' => $categories,
                'authors' => $authors
            ]
        );
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {


        $pathThumbnail = $request->thumbnail->store(
            "/images/products/{$request->sku}",
            'public'
        );

        $product->title = $request->title;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->thumbnail = $pathThumbnail;
        $product->author_id = $request->selectauthor;

        if ($product->save()) {
            $product->category()->detach();
            ProductGallery::where('product_id', '=', $product->id)->delete();

            foreach ($request->selectcategory as $categoryID) {
                $product->category()->attach(
                    $categoryID
                );
            }
        }

        if (!empty($request->productgalleries)) {
            foreach ($request->productgalleries as $productgallery) {
                $pathProductGallery = $productgallery->store(
                    "/images/products/{$request->sku}",
                    'public'
                );
                $gallery = new \App\ProductGallery();
                $gallery->image_path = $pathProductGallery;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }
        return redirect()->route('products');
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
