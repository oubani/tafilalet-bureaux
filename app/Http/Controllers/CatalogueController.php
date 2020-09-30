<?php

namespace App\Http\Controllers;

use App\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('Admin.catalogues', ['catalogues' => $catalogues]);
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
            'mois' => 'required|string|min:3',
            'cover' => 'required|image',
            'pdfFile' => 'required|mimes:pdf|max:10000'
        ]);



        $imageName = date("Y") . '_' . time() . '_' . $request->file('cover')->extension();
        $pdfFile = date("Y") . '_' . time() . '_' . $request->file('pdfFile')->getClientOriginalName();


        DB::table('catalogues')->insert([
            'mois' => $request->mois,
            'cover' => $imageName,
            'pdfFile' => $pdfFile,
        ]);

        //  upload image & pdf 
        // $request->file('pdfFile')->storeAs('catalogues', $pdfFile, 'public');
        $request->cover->move(public_path('images'), $imageName);
        $request->pdfFile->move(public_path('catalogues'), $pdfFile);

        return redirect('/catalogue')->with('success', 'le catalogue a ete uploader');
    }

    /**
     * Display all Cataloues for client.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */

    public function allcatalogues()
    {
        $catalogues = DB::table('catalogues')
            ->select('*')
            ->orderBy('id', 'desc')
            ->paginate(12);
        return view('catalogues.catalogues', ['catalogues' => $catalogues]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogue $catalogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogue $catalogue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalogue = Catalogue::findorFail($id);
        if ($catalogue) {
            Storage::disk()->delete('catalogues/' . $catalogue->pdfFile);
            // Storage::disk()->delete('images/' . $catalogue->cover);
            $catalogue->delete();
            return Redirect('/catalogue')->with('success', 'catalogue a été supprimer ');
        }
    }
}
