@extends('admin.admin')
<title>Gerer les produits</title>
@section('adminContent')
    <div class="container">
        <div class="row mt-2 ">
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <th scope="col" align="center">image</th>
                        <th scope="col" align="center">Réfrence</th>
                        <th scope="col" align="center">name</th>
                        <th scope="col" align="center">description</th>
                        <th scope="col" align="center">etat</th>
                        <th scope="col" align="center">garentie</th>
                    </thead>
                    <tbody>
                        @foreach ($materials as $material)
                        <tr>
                            <td><img src="images/{{$material->image}}" width="100px" height="100px"  alt="{{$material->name}}"></td>
                            <td>{{$material->ref}}</td>
                            <td>{{$material->name}}</td>
                            <td>{{$material->description}}</td>
                            <td>{{$material->etat==1?'nouveau':'utilisé'}}</td>
                            <td>{{$material->garentie}} ans </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <form class="card text-white bg-dark px-4 py-3" enctype="multipart/form-data"  method="POST" action="/materialInformatique" >
                    @csrf
                    
                    <div class="form-group row">
                        <label for="ref" class="col-form-label text-md-right">{{ __('Reférence') }}</label>
                        <input id="ref" type="text" class="form-control @error('ref') is-invalid @enderror" name="ref" required autocomplete="new-ref">
                    </div>
                    
                    <div class="form-group row">
                        <label for="name" class="col-form-label text-md-right">{{ __('Nom Du Produit') }}</label>                       
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="new-name">
                    </div>
                    <div class="form-group row">
                        <label for="desc" class="col-form-label text-md-right">{{ __('Description') }}</label>                       
                        <textarea id="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" required></textarea>
                    </div>

                    <div class="form-group ">
                        <label for="exampleFormControlFile1">Selectionner L'image du produit </label>
                        <input type="file" name="image" class="py-3">
                    </div>

                    <div class="form-group">
                        <label for="garentie">garentie</label>
                        <select class="form-control mb-3 " name="garentie" id="exampleFormControlSelect1">
                            @for ($i = 1; $i < 5; $i++)
                            <option value="{{$i}}">{{$i}} </option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="etat">etat</label>
                        <select class="form-control mb-3 " name="etat" id="exampleFormControlSelect1">
                            <option value="0">utilisé </option>
                            <option value="1">nouveau </option>
                        </select>
                    </div>

                    <input type="submit" value="Ajouter le produit " class="btn btn-primary btn-block">
                  </form>
            </div>
        </div>
    </div>
@endsection