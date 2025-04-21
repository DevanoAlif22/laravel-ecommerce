<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function acak()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('cms.product.index', compact('products'));
    }


    public function create()
    {
        // Ambil semua kategori dari database
        $categories = Category::orderBy('id', 'desc')->get();
        return view('cms.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi file gambar
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Simpan file yang diunggah ke dalam direktori tertentu dengan nama yang memiliki timestamp
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $this->acak() . '_' . $file->getClientOriginalName();
            $file->move(public_path('public/uploads/product'), $fileName);
            // Simpan nama file yang telah diubah ke dalam $validatedData
            $validatedData['image'] = $fileName;
        }

        // Simpan data ke dalam database
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'price' => $validatedData['price'],
            'image' => $validatedData['image'] ?? null,
        ]);


        if ($product) {
            return redirect('/admin/product')->with('success', 'product added successfully!');
        } else {
            return redirect('/admin/product/add')->with('error', 'Failed to add product. Please try again.');
        }
    }

    public function edit($id)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $product = Product::where('id', $id)->first();
        return view('cms.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        // Validasi data yang dikirim melalui form edit
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi file gambar
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);


        $product = Product::where('id', $id)->first();
        if ($product) {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $this->acak() . '_' . $file->getClientOriginalName();
                $file->move(public_path('public/uploads/product'), $fileName);
                // Hapus foto lama jika ada dan simpan foto baru
                $oldImagePath = public_path('public/uploads/product/') . $product->image;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
                $product->image = $fileName;
            }

            // Update data berita dengan data baru
            $product->name = $validatedData['name'];
            $product->description = $validatedData['description'];
            $product->category_id = $validatedData['category_id'];
            $product->price = $validatedData['price'];


            // Simpan perubahan
            $product->save();

            return redirect()->route('admin.product.index')->with('success', 'product updated successfully.');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'product not found.');
        }
    }

    public function destroy($id)
    {
        // Temukan berita berdasarkan ID
        $data = Product::find($id);
        if ($data) {
            $data->delete();
            return  redirect()->route('admin.product.index')->with('success', 'product deleted successfully.');
        } else {
            return  redirect()->route('admin.product.index')->with('error', 'Failed to delete product. Category not found.');
        }
    }
}
