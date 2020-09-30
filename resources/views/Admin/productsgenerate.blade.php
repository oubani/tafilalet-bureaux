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
                        <th scope="col" align="center">Modifier</th>
                        <th scope="col" align="center">Supprimer</th>
                        
                    </thead>
                    <tbody>
                        @if (Count($products)>0)
                            @foreach ($products as $product)
                                <tr>
                                    <td><img src="images/{{$product->image}}" width="100px" height="100px"  alt="{{$product->name}}"></td>
                                    <td>{{$product->ref}}</td>
                                    <td>{{$product->name}}</td>
                                    <td> 
                                        <button type="button" class="btn btn-primary" onclick="myFunction('{{$product->ref}}','{{$product->name}}')"  data-toggle="modal" data-target="#exampleModal">
                                            Modifier
                                        </button>
                                    </td>
                                    <td>
                                        {!!Form::open(['action' => ['ProductController@destroy', $product->ref], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Modifier Produit </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['action' => ['ProductController@update', $product->ref], 'method' => 'POST']) !!}
                                            <div class="form-group">
                                                {{Form::label('title', 'Name')}}
                                                {{Form::text('name', '', ['id'=>'title' ,'class' => 'form-control', 'placeholder' => 'Title'])}}
                                                {{Form::hidden('ref', '', ['id'=>'ref' ,'class' => 'form-control', 'placeholder' => 'ref'])}}
                                            </div>
                                            {{Form::hidden('_method','PUT')}}
                                            {{Form::submit('Modifier', ['class'=>'btn btn-primary btn-block '])}}
                                        {!! Form::close() !!}
                                        <button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">Fermer</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <tr>
                            <td>Inserer des produit</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $products->links() }}
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
         <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
        function myFunction(ref,title) {

            document.getElementById('title').value = title;
            document.getElementById('ref').value = ref;
        }
    </script>
    </div>
@endsection