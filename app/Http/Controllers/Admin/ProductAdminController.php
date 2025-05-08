<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProductAdminController extends Controller
{
    public function index()
    {
        Paginator::useBootstrapFive();
        Paginator::defaultView('vendor.pagination.custom');
        $products = Product::latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image',
            'judul' => 'required',
            'jenis' => 'required',
            'merk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'daerah' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'Lat' => 'required|numeric',
            'Long' => 'required|numeric',
        ]);

        $path = $request->file('gambar')->store('products', 'public');

        Product::create(array_merge($request->except('gambar'), [
            'gambar' => $path,
        ]));

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroySelected(Request $request)
    {
        Product::whereIn('id', $request->input('selected', []))->delete();
        return redirect()->route('admin.products.index')->with('success', 'Data terpilih berhasil dihapus');
    }
}