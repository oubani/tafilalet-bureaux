@extends('Admin.admin')
@section('adminContent')
    <div class="container">

        <div class="row my-5 ">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($partenaires as $partenaire)
                    <div class="col-md-4">
                        <div class="card mb-3" style="max-width: 300px;">
                            <div class="row no-gutters">
                            <div class="col-md-6">
                                <img width="100%"  src="/images/{{$partenaire->thumbnail}} " class="card-img" alt="...">
                            </div>
                            <div class="col-md-6 py-2">
                                <div class="card-body">
                                    {!!Form::open(['action' => ['PartenaireController@destroy', $partenaire->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </div>
                            </div>
                            </div>
                        </div>      
                    </div>                
                    @endforeach
                </div>
            </div>
              <div class="col-md-4 p-3 card rounded bg-dark text-light ">
                <h4>Ajouter Partenaire</h4>
                <form action="/partenaire" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group ">
                        <label for="exampleFormControlFile1">Selectionner L'image du cover catalogue </label>
                        <input type="file" name="thumbnail" required class="py-3">
                    </div>
                    
                    <input type="submit" value="Ajouter" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
@endsection