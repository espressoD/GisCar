<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Product::query();
        $products = Product::select(['id','gambar','judul','merk','deskripsi','harga','daerah','alamat','kontak','lat','long'])->get();
        $areas = Product::select('daerah')->distinct()->get();
        $carTypes = Product::select('jenis')->distinct()->get();
        $brands = Product::select('merk')->distinct()->get();
        $area = $request->input('area');
        $jenis = $request->input('jenis');
        $brand = $request->input('brand');
        $price = $request->input('price');
        if ($area) {
            $query->where('daerah', $area);
        }
    
        if ($jenis) {
            $query->where('jenis', $jenis);
        }
    
        if ($brand) {
            $query->where('merk', $brand);
        }
    
        if ($price) {
            switch ($price) {
                case 'low':
                    $query->whereBetween('harga', [100000000, 250000000]);
                    break;
                case 'mid':
                    $query->whereBetween('harga', [250000000, 500000000]);
                    break;
                case 'high':
                    $query->whereBetween('harga', [500000000, 1000000000]);
                    break;
                case 'luxury':
                    $query->where('harga', '>=', 1000000000);
                    break;
            }
        }
    
        $products = $query->get();
        $initialMarkers = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'judul' => $product->judul,
                'harga' => number_format($product->harga, 0, ',', '.'),
                'daerah' => $product->daerah,
                'Lat' => $product->Lat,
                'Long' => $product->Long,
            ];
        });
        return view('products.index', [
            'initialMarkers' => $products,
            'areas' => $areas,
            'carTypes' => $carTypes,
            'brands' => $brands,
        ]); 
        //return view ('products.index', compact('products', 'initialMarkers', 'areas', 'carTypes', 'brands'));
    } 
    // public function showMap()
    // {
    //     $initialMarkers = Product::all(); // Adjust the query as needed
    //     return view('products.index', compact('initialMarkers'));
    // }
    public function show($id)
    {
        $product=product::find($id);

    if(!$products){
        abort(404, 'Product not found');
    }
    return view('products.show', compact('product'));
    }

    
}
