<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = DB::table('categories')->paginate(6);
        return view('Admin.category', ['categories' => $categories]);
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
        //
        $request->validate([
            'name' => 'required|string|min:8'
        ]);
        DB::table('categories')->insert([
            'category_name' => $request->name,
        ]);
        return redirect('/category')->with('success', 'categorie ajouté avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:8',
            'id' => 'required|numeric|min:1,max:4',
        ]);

        $category = Category::findorFail($request->id);
        $category->id = $request->id;
        $category->Category_name = $request->title;
        $category->save();

        return redirect('/category')->with('succes', 'Categorie Mis à jour avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $id = $category->id;
        $newcategory = Category::findorFail($id);
        if (!$newcategory) {
            return redirect('/category')->with('error', 'No Categorie Found');
        }

        $newcategory->delete();

        return redirect('/category')->with('success', ' Categorie supprimer');
    }
}
