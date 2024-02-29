<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = buku::where('nama', 'LIKE', '%' . $request->search)->paginate(5);
        } else {
            $data = buku::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('layouts.products.index', compact('data'));
    }

    public function create()
    {
        return view('layouts.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        // Store Product
        $data = new buku();
        $data->name = $request->name;
        $data->judul = $request->judul;
        $data->penulis = $request->penulis;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('products.index')->withSuccess('Product Added Successfully');
    }

    public function edit($id)
    {
        $data = buku::find($id);
        return view('layouts.products.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048', // Adjust max file size as needed
        ]);

        // Find the Product
        $data = buku::find($id);

        if (!$data) {
            return redirect()->route('products.index')->withError('Product not found.');
        }

        // Update Product details
        $data->name = $request->name;
        $data->judul = $request->judul;
        $data->penulis = $request->penulis;
        $data->description = $request->description;

        // Handle image upload
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png|max:2048', // Adjust max file size as needed
            ]);

            $imagePath = 'image/';
            $destination = $imagePath . $data->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $imageFileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($imagePath, $imageFileName);
            $data->image = $imageFileName;
        }

        $data->save();

        return redirect()->route('products.index')->withSuccess('Product Updated Successfully');
    }


    public function destroy($id)
    {
        $data = buku::findOrFail($id);
        $destination = 'image/' . $data->photo;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $data->delete();
        return redirect()->route('products.index')->with('success', 'Data Behasil Di Hapus!');
    }
}
