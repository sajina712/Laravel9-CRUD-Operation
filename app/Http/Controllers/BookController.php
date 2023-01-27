<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $books = Book::orderBy('id','desc')->paginate(5);
        return view('books.index', compact('books'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('books.add');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'books_title' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            'price' => 'required',
            'description' => 'required',
        ]);
        
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('books_images'), $imageName);
        $data = $request->input();
        $data['image']=$imageName;

        Book::create($data);

        return redirect()->route('books.index')->with('success','Books has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Book  $book
    * @return \Illuminate\Http\Response
    */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\book  $book
    * @return \Illuminate\Http\Response
    */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\book  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'books_title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        
        

        $data = $request->all();
  
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('books_images'), $imageName);
            $data = $request->input();
            $data['image']=$imageName;
        }else{
            unset($data['image']);
        }

        $book->fill($data)->save();

        return redirect()->route('books.index')->with('success','Books Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Book  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Books has been deleted successfully');
    }
}