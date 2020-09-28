@extends('admin.admin')
<title>Gerer les produits</title>
@section('adminContent')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <th scope="col" align="center">image</th>
                        <th scope="col" align="center">Réfrence</th>
                        <th scope="col" align="center">labelle</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td><img src="images/{{$product->image}}" width="100px" height="100px"  alt="{{$product->name}}"></td>
                            <td>{{$product->ref}}</td>
                            <td>{{$product->name}}</td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <form class="card text-white bg-dark px-4 py-3" enctype="multipart/form-data"  method="POST" action="/product" >
                    @csrf
                    
                    <div class="form-group row">
                        <label for="ref" class="col-form-label text-md-right">{{ __('Reférence') }}</label>
                        <input id="ref" type="text" class="form-control @error('ref') is-invalid @enderror" name="ref" required autocomplete="new-ref">
                    </div>
                    
                    <div class="form-group row">
                        <label for="name" class="col-form-label text-md-right">{{ __('Nom Du Produit') }}</label>                       
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="new-name">
                    </div>

                    <div class="form-group ">
                        <label for="exampleFormControlFile1">Selectionner L'image du produit </label>
                        <input type="file" name="image" class="py-3">
                    </div>

                    <select class="form-control mb-3 " name="category_id" id="exampleFormControlSelect1">
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->category_name}} </option>
                        @endforeach
                    </select>

                    <input type="submit" value="Ajouter le produit " class="btn btn-primary btn-block">
                  </form>
            </div>
        </div>
    </div>
@endsection