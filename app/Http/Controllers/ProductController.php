<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase;

class ProductController extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db =  Firebase::database();
    }

    public function index() {
        $products = $this->db->getReference('products')->getSnapshot()->getValue();

        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $name = $request->name;
        $price = $request->price;

        $product = ['name' => $name, 'price' => $price];

        $this->db->getReference('products')->push($product);

        return redirect()->back();
    }

    public function edit(Request $request, $key) {
        $product = $this->db->getReference('products/'. $key)->getSnapshot()->getValue();

        return view('products.edit', compact('product', 'key'));
    }

    public function update(Request $request, $key) {
        $name = $request->name;
        $price = $request->price;
        $product = ['name' => $name, 'price' => $price];

        $this->db->getReference('products/' . $key)->update($product);

        return redirect()->back();
    }

    public function destroy($key) {
        $this->db->getReference('products/' . $key)->remove();

        return redirect()->back();
    }
}
