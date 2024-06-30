<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();

        return view('product', [
            'products' => $products
        ]);
    }


    public function pdf() {
        // return view('product-list', compact('products'));
        $products = Product::orderBy('name')->get();
        $pdf = Pdf::loadView('product-list', compact('products'));
        return $pdf->stream('product-list.pdf');
     }
}
