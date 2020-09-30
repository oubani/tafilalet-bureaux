<?php

namespace App\Http\Controllers;

use App\MaterialInformatique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialInformatiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = MaterialInformatique::all();

        return view('Admin.materialInformatique', ['materials' => $materials]);
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
            'ref' => 'required|unique:material_informatiques,ref',
            'name' => 'required|string',
            'desc' => 'required|string',
            'name' => 'required|string',
            'garentie' => 'required|integer',
            'etat' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        DB::table('material_informatiques')->insert([
            'ref' => $request->ref,
            'name' => $request->name,
            'description' => $request->desc,
            'image' => $imageName,
            'garentie' => $request->garentie,
            'etat' => $request->etat,
        ]);
        $request->image->move(public_path('images'), $imageName);
        return redirect('/materialInformatiqueGenerate')->with('success', 'le produit a été ajouter ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialInformatique  $materialInformatique
     * @return \Illuminate\Http\Response
     */
    public function show($ref)
    {
        $material = DB::table('material_informatiques')
            ->select('*')
            ->where('ref', '=', $ref)
            ->get();
        return view('materialsInformatique.material', ['material' => $material]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialInformatique  $materialInformatique
     * @return \Illuminate\Http\Response
     */
    public function allMaterials()
    {
        $materials = DB::table('material_informatiques')->paginate(8);
        return view('materialsInformatique.materials', ['materials' => $materials]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialInformatique  $materialInformatique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialInformatique $materialInformatique)
    {
        return $request;
        $material = DB::table('material_informatiques')
            ->select('*')
            ->where('ref', '=', $request->ref)
            ->get();
        if (count($material) > 0) {
            DB::table('material_informatiques')
                ->where('ref', $request->ref)
                ->update(['name' => $request->name]);
            return redirect('materialInformatiqueGenerate')->with('success', 'le produit a été modifier ');
        } else {
            return redirect('materialInformatiqueGenerate')->with('error', 'le produit n\est pas  modifier ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialInformatique  $materialInformatique
     * @return \Illuminate\Http\Response
     */
    public function destroy($ref)
    {
        $material = DB::table('material_informatiques')
            ->select('*')
            ->where('ref', '=', $ref)
            ->get();
        if (count($material) == 0) {
            return redirect('materialInformatiqueGenerate')->with('error', 'le produit n\'est pas supprimer');
        }
        DB::table('material_informatiques')->where('ref', '=', $ref)->delete();

        return redirect('materialInformatiqueGenerate')->with('success', 'le produit a été supprimer');
    }
}
