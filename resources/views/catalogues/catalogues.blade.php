@extends('layouts.app')
<title>Tafilalet Bureaux | catalogues</title>
@section('content')
    <div class="container my-3 ">
        <div class="row">
            @foreach ($catalogues as $catalogue)
                <div class="col-md-3 col mt-3 col-12 ">
                        <div class="card rounded   ">
                            <a href="/catalogues/{{$catalogue->pdfFile}} " download >
                                <img style="width:100% " src="/images/{{$catalogue->cover}} " class="card-img-top" alt="cover du catalogue">    
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mx-auto col-md-12 my-2">
                {{ $catalogues->links() }}
            </div>
    </div>
@endsection
