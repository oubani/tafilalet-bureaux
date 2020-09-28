@extends('layouts.app')
<title>Tafilalet Bureaux | Bienvenue </title>
@section('content')


{{--  Carousel --}}

    <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner mt-1 ">
                    <?php $i=0 ?>
                    @foreach ($slides as $slide)
                        @if ($i==0)
                            <div class="carousel-item active">
                                <img class="d-block w-100" height="500px"  src="images/{{$slide->image}}" alt="First slide">
                            </div>
                            <?php $i++ ?>
                        @else
                            <div class="carousel-item">
                            <img class="d-block w-100"   src="images/{{$slide->image}}" alt="Second slide">
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
    </div>

    {{-- Les nouveaux produits --}}

    <div class="container">
        <h1 class="h1 my-4 " > Les Nouveaux Produits</h1>
        <div class="row">
            @foreach ($products as $item)
            <x-product-item class="bg-danger" :ref="$item->ref" :image="$item->image" :name="$item->name" size="3" />
            @endforeach
        </div>
        <center> <a href="/produits" class="btn btn-primary mt-4 px-5 "> Voir plus  </a> </center>
    </div>

    {{-- Notre services --}}
    
    <div class="container  ">
        <h1 class="my-3" >Notre Services</h1>
        <section class="notreService">
            @foreach ($services as $service)
                <div class="serviceItem shadow rounded card">
                    <img src="/images/{{$service->image}}" alt="{{$service->title}}" height="200px" >
                    <h3>{{$service->title}}</h3>
                    <p>
                        {{$service->body}}
                    </p>
                </div>
            @endforeach
        </section>
    </div>
        
    {{-- material INformatique --}}

    <div class="container">
        <h1 class="my-2">Material Informatique</h1>
        <section class="materialInfo">
            <div class="row">
                @foreach ($materials as $material)
                    <div class="col-md-6">
                        <div class="row shadow mt-4 mx-2 p-3 "  >
                            <div class="col-md-6"><img src="/images/{{$material->image}}"  height="150px"  alt="{{$material->name}}"></div>
                            <div class="col-md-6">
                                <h4>{{$material->name}}</h4>
                                <span class="badge bg-primary mb-2 ">{{$material->ref}}</span><br>
                                <a href="/material/{{{$material->ref}}}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <center>
                <a href="/materials" class="btn btn-primary mt-3 ">Voir plus  </a>
            </center>
        </section> 
    </div>
    {{-- Catalogue --}}
    <div class="container">
        <h1 class="my-4" >Catalogues</h1>
        <section class="catalogues">
            <div class="row">
                @foreach ($catalogues as $catalogue)
                    <div class="col-md-4 ">
                        <div class="card rounded   ">
                            <a href="/catalogues/{{$catalogue->pdfFile}} " download >
                                <img style="height: 400px" src="/images/{{$catalogue->cover}} " class="card-img-top" alt="cover du catalogue">    
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>


    {{-- partenaire --}}
    <div class="container">
        <h1 class="mt-5 bb-3" >Nos Partenaires</h1>
        <section class="catalogues">
            <div class="row">
                @foreach ($partenaires as $partenaire)
                    <div class="col-md-2 col-3 ">
                        <img  src="/images/{{$partenaire->thumbnail}} " class="card-img-top" alt="cover du catalogue">    
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    
    <script>
        $('.carousel').carousel();
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
@endsection