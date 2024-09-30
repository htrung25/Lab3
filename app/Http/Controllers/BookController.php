<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;


class BookController extends Controller
{
    // Hiển thị danh sách sách
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    // Lưu dữ liệu sách mới
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Hiển thị form sửa sách
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // Cập nhật dữ liệu sách
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Xóa sách
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
