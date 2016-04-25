<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use App\Http\Requests;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Yajra\Datatables\Facades\Datatables;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index');
    }

    public function getlist(Request $request)
    {
        return Datatables::eloquent(Book::query())->make(true);
        // return Datatables::queryBuilder(DB::table('books'))->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.create', [$authors, $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'price' => 'required|numeric|min:0.0',
            'release_date' => 'required|date',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('book/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $book = new Book;
            // Did not wanna use the $this->create
            $book->title = $request->title;
            $book->description = $request->description;
            $book->price = $request->price;
            $book->release_date = $request->release_date;
            if (Auth::check()) {
                $book->created_by = $request->user()->id;
                $book->updated_by = $request->user()->id;
            }
            $book->save();
        }
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
