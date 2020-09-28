<?php

namespace App\Http\Controllers;

use App\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $partenaires = Partenaire::all();
        return view('Admin.partenaires', ['partenaires' => $partenaires]);
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
        $request->validate([
            'thumbnail' => 'required|image'
        ]);

        $thumbnail = date("Y") . '_' . time() . '.' . $request->thumbnail->extension();

        if (DB::table('partenaires')->insert([
            'thumbnail' => $thumbnail
        ])) {
            $request->thumbnail->move(public_path('images'), $thumbnail);
        }


        return redirect('/partenaire')->with('success', 'partenaire a ete ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partenaire $partenaire)
    {
        //  find a partener
        $idPart = $partenaire->id;

        $newPartenaire = Partenaire::findorFail($idPart);

        //  check if partener is exist
        if (!isset($newPartenaire)) {
            return redirect('/partenaire')->with('danger', 'partenaire n\' existe pas');
        }

        // Storage::delete('public/images/' . $newPartenaire->thumbnail);

        $newPartenaire->delete();

        return redirect('/partenaire')->with('success', 'partenaire supprimé avec succès');
    }
}
