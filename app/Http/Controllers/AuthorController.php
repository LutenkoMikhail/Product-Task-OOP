<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorCreateRequest;
use Illuminate\Support\Facades\Config;

class AuthorController extends Controller
{
    private $paginate;

    public function __construct()
    {
        $this->paginate = Config::get('constants.paginate.paginate_author_10');
    }

    public function index()
    {
        $authors = Author::paginate($this->paginate);
        return view('authors.index', [
            'authors' => $authors
        ]);
    }

    public function show(Author $author)
    {
        return view('authors.view',
            [
                'author' => $author
            ]
        );
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorCreateRequest $request)
    {
        $author = new \App\Author();
        $author->name = $request->name;
        $author->surname = $request->surname;
        if ($author->save()) {
            return redirect()->route('authors');
        }
        return redirect()->back();
    }

    public function edit(Author $author)
    {
        return view('authors.edit',
            [
                'author' => $author
            ]
        );
    }

    public function update(AuthorCreateRequest $request, Author $author)
    {

        $author->name = $request->name;
        $author->surname = $request->surname;
        if ($author->save()) {
            return redirect()->route('authors');
        }
        return redirect()->back();
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
    public function delete(Author $author)
    {
        $author->product()->delete();
        $author->delete();
        return redirect()->route('authors');
    }
}
