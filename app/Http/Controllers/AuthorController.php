<?php

namespace App\Http\Controllers;

use App\Author;
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

    public function edit(Author $author)
    {
        dd($author);
    }

    public function update(Author $author)
    {
        dd($author);
    }

}
