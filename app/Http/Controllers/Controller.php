<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $paginate;

}

//    public function update(Author $author)
//    {
//        return view('sorry',
//            [
//                'nameClass' => __CLASS__,
//                'nameMethod' => __METHOD__
//            ]
//        );
//    }
