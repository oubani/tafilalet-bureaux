@extends('layouts.app')
<title>Tafilalet Bureaux | {{$material[0]->name}} </title>
@section('content')
    <div class="container card my-2 ">
        <div class="row  ">
            <div class="col-md-6">
                <img src="/images/{{$material[0]->image}}" alt="{{$material[0]->name}}">
            </div>
            <div class="col-md-6">
                <h1>{{$material[0]->name}}</h1>
                <b>description :</b><p> {{$material[0]->description}}</p>
                <b>ref : </b> <span class="badge text-light bg-primary">{{$material[0]->ref}}</span><br>
                <b>etat :</b> {{$material[0]->etat?'nouveaux':'utilesé'}}</p>
                <b>garentie :  </b> {{$material[0]->garentie}} anneé
            </div>
        </div>
    </div>
@endsection