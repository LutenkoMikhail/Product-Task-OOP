<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    protected $paginate;

    public function __construct()
    {
        $this->paginate = Config::get('constants.paginate.paginate_product_5');
    }

    public function index()
    {
        $products = Product::paginate($this->paginate);
        return view('welcome', [
            'products' => $products
        ]);
    }
}
