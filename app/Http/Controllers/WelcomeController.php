<?php

namespace App\Http\Controllers;

use App\Catalogue;
use App\MaterialInformatique;
use App\Partenaire;
use App\Product;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $slides =
            DB::table('slides')
            ->select('*')
            ->orderBy('id', 'desc')
            ->where('state', '!=', 0)
            ->get();
        $products =
            DB::table('products')
            ->select('*')
            ->limit(4)
            ->get();
        $materials =
            DB::table('material_informatiques')
            ->select('*')
            ->limit(4)
            ->get();
        $catalogues = DB::table('catalogues')
            ->select('*')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
        $partenaires = Partenaire::all();
        $services = DB::select('select * from services ');
        return view('welcome', ['slides' => $slides, 'products' => $products, 'materials' => $materials, 'catalogues' => $catalogues, 'partenaires' => $partenaires, 'services' => $services]);
    }
}
