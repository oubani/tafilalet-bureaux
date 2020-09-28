<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    // this functioon is for admin to see all szervices
    public function index()
    {
        $services = DB::table('services')->select('*')->get();
        return view('Admin.services', ['services' => $services]);
    }

    // update service
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required|string|min:5',
            'body' => 'required|string|min:10',
        ]);
        if ($request->image === null) {
            DB::table('services')
                ->where('id', '=', $request->id)
                ->update([
                    'title' => $request->title,
                    'body' => $request->body
                ]);
        }
        if ($request->image !== null) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg']);
            $imagename = date('Y') . '_' . time() . '.' . $request->image->extension();
            DB::table('services')
                ->where('id', '=', $request->id)
                ->update([
                    'title' => $request->title,
                    'body' => $request->body,
                    'image' => $imagename,
                ]);
            $request->image->move(public_path('images'), $imagename);
        }
        return redirect('/services')->with('success', 'service mis à jour ');
    }
}
