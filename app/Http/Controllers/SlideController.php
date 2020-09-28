<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check is admin
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $slides = DB::table('slides')->paginate(5);
        return view('Admin.slide', ['slides' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'Slide Created';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 1) {
            return redirect('/');
        }
        $request->validate([
            'image' => 'required|image',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        // return $imageName;
        DB::table('slides')->insert([
            'image' => $imageName,
            'state' => '0'
        ]);
        $request->image->move(public_path('images'), $imageName);
        return redirect('/slide')->with('success', 'Image a été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $slide = Slide::findorFail($id);
        if ($slide->state == 1) {
            $slide->state = 0;
        } else {
            $slide->state = 1;
        }
        $slide->save();
        return  redirect('/slide')->with('success', 'operation effectue avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
}
