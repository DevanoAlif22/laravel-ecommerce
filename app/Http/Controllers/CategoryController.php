<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('cms.category.index', compact('categories'));
    }

    public function create()
    {
        return view('cms.category.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim melalui form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan data ke dalam database
        $category = Category::create([
            'name' => $validatedData['name']
        ]);


        if ($category) {
            return redirect('/admin/category')->with('success', 'Category added successfully!');
        } else {
            return redirect('/admin/category/add')->with('error', 'Failed to add category. Please try again.');
        }
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('cms.category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        // Validasi data yang dikirim melalui form edit
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $category = Category::where('id', $id)->first();
        if ($category) {

            // Update data berita dengan data baru
            $category->name = $validatedData['name'];

            // Simpan perubahan
            $category->save();

            return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Category not found.');
        }
    }

    public function destroy($id)
    {
        // Temukan berita berdasarkan ID
        $data = Category::find($id);
        if ($data) {
            $data->delete();
            return  redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
        } else {
            return  redirect()->route('admin.category.index')->with('error', 'Failed to delete Category. Category not found.');
        }
    }
}
