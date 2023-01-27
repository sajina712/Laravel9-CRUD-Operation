<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResources;


class ProductController extends Controller
{
    public function index()
    {
      return BookResources::collection(Book::all());
     
    }

}
