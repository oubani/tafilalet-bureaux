@extends('layouts.app')
<title> Tafilalet Bureaux | Produits</title>
@section('content')

<div class="container">
    <div class="row my-3 ">
        <div class="col-md-3">
            <ul class="list-group">
                @foreach ($categories as $categorie)
                    <li class="list-group-item {{$categorie->id==$categoryId ? 'active' : ' '}}"><a href="/produits/{{$categorie->id}} ">{{$categorie->category_name}} </a> </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                @if (count($produits)>0)
                    @foreach ($produits as $item)
                    <x-product-item :ref="$item->ref" :image="$item->image" :name="$item->name" size="4"/>
                        {{-- <div class="col-md-4 col-sm-6 ">
                            <div class="card mb-2 shadow rounded">
                                <img class="card-img-top" src="/images/{{$item->image}} " alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title" style="height: 42px" >{{$item->name}} </h5>
                                <p class="card-text"><div class="badge badge-warning p2 "> ref : {{$item->ref}} </div></p>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                @else
                    pas du produits pour cette categorie 
                @endif
            </div>
            {{ $produits->links() }}
        </div>
    </div>
</div>
@endsection