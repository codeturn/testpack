<?php

namespace Codeturn\Test\Http\Controllers;


class PostController extends Controller
{
    public function index()
    {
        $data = ['posts' => [1,2,3]];
        return view('posts::index', $data);
    }
}
