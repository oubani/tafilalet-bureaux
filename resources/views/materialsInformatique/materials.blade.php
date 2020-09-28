@extends('layouts.app')
<title>Tafilalet Bureaux | Materials Informatiques </title>
@section('content')
    <div class="container my-2 ">
        <div class="row">    
            @foreach ($materials as $material)   
            <div class="col-md-6">
                <div class="row shadow mt-4 mx-2 p-3 "  >
                    <div class="col-md-6"><img src="/images/{{$material->image}}"  height="150px"  alt="{{$material->name}}"></div>
                    <div class="col-md-6">
                        <h4>{{$material->name}}</h4>
                        <span class="badge bg-primary text-white mb-2 ">{{$material->ref}}</span><br>
                        <a href="/material/{{{$material->ref}}}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>  
            @endforeach
            <div class="mx-auto mt-4  ">{{ $materials->links() }}</div>
        </div>
    </div>
@endsection