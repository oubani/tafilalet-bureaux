<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Products Admin page
        $products = DB::table('products')
            ->select('*')
            ->paginate(6);
        $categories = Category::all();
        return view('Admin.productsgenerate', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required|string|min:10',
            'ref' => 'required|unique:products,ref|string|min:3',
            'image' => 'required|image',
            'category_id' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        // return $imageName;
        DB::table('products')->insert([
            'ref' => $request->ref,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);
        $request->image->move(public_path('images'), $imageName);
        return redirect('/ProductsGenerate')->with('success', 'le produit a été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function Categored($id = 1)
    {
        $produits = DB::table('products')
            ->select('*')
            ->where('category_id', '=', $id)
            ->paginate(9);
        $categories = Category::all();
        // return $produits;
        return view('products.products', ['produits' => $produits, 'categoryId' => $id, 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = DB::table('products')
            ->select('*')
            ->where('ref', '=', $request->ref)
            ->get();
        if (count($product) > 0) {
            DB::table('products')
                ->where('ref', $request->ref)
                ->update(['name' => $request->name]);
            return redirect('ProductsGenerate')->with('success', 'le produit a été modifier ');
        } else {
            return redirect('ProductsGenerate')->with('error', 'le produit n\est pas  modifier ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($ref)
    {
        // return $product;
        $product = DB::table('products')
            ->select('*')
            ->where('ref', '=', $ref)
            ->get();
        if (count($product) == 0) {

            return redirect('ProductsGenerate')->with('error', 'le produit n\'est pas supprimer');
        }
        DB::table('products')->where('ref', '=', $ref)->delete();

        return redirect('ProductsGenerate')->with('success', 'le produit a été supprimer');
    }
}
