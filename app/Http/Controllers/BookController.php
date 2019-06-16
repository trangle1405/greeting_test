<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Book;
use App\Http\Requests\BookValidation;

class BookController extends Controller
{
    public function list()
    {
        $book = Book::paginate(5);
        return view('book.list', compact('book'));
    }

    public function create()
    {
        return view('book.add');
    }

    public function store(BookValidation $request)
    {
        $attribute = $request->all();
        if (!$request->hasFile('image')) {
            $request['image'] = '';
        } else {
            $file = $request->file('image');

            $fileName = $file->getClientOriginalName();
            $newFileName = rand(11111, 99999) . "_" . $fileName;
            $request->file('image')->storeAs('public/images', $newFileName);;
            $attribute['image'] = $newFileName;
        }
        $book = Book::create($attribute);
        return redirect()->route('book.list')->with('success', 'Đã thêm  sach!');

    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    public function update(BookValidation $request, $id)
    {
        $book = Book::findOrFail($id);
        $attribute = $request->all();
        if (!$request->hasFile('image')) {
            $request['image'] = '';
        } else {
            $file = $request->file('image');

            $fileName = $file->getClientOriginalName();
            $newFileName = rand(11111, 99999) . "_" . $fileName;
            $request->file('image')->storeAs('public/images', $newFileName);;
            $attribute['image'] = $newFileName;
        }
        $book->update($attribute);
        return redirect()->route('book.list')->with('success', 'Đã chinh sach!');

    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('book.list')->with('success', 'Đã xoa sach!');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!$keyword) {

            return redirect()->route('book.list');

        }

        $book = Book::where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);


        return view('book.list', compact('book'));

    }
}
