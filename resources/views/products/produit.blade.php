@extends('layouts.app')
<title>Tafilalet Bureaux | {{$produit[0]->name}} </title>
@section('content')
    <div class="container my-2">
        <div class="card shadow ">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/{{$produit[0]->image}}" width="100%" alt="{{$produit[0]->name}}" srcset="">
                </div>
                <div class="col-md-6 my-auto" style="border-left: rgb(195, 182, 182) 1px solid"  >
                    <h1  >{{$produit[0]->name}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection