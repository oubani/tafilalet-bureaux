@extends('admin.admin')
<title>Gerer les produits</title>
@section('adminContent')
    <div class="container">
        <div class="row mt-2 ">
            <div class="col-md-9">
                <table class="table">
                    <thead class="thead-dark">
                        <th scope="col" align="center">Image</th>
                        <th scope="col" align="center">Réfrence</th>
                        <th scope="col" align="center">Name</th>
                        <th scope="col" align="center">Description</th>
                        <th scope="col" align="center">Etat</th>
                        <th scope="col" align="center">Garentie</th>
                        <th scope="col" align="center">Supprimer</th>
                        <th scope="col" align="center">Modifier</th>
                    </thead>
                    <tbody>
                        @if (count($materials)>0)
                            
                        
                        @foreach ($materials as $material)
                        <tr>
                            <td><img src="images/{{$material->image}}" width="100px" height="100px"  alt="{{$material->name}}"></td>
                            <td>{{$material->ref}}</td>
                            <td>{{$material->name}}</td>
                            <td> <div style="height: 110px ;overflow:hidden " > {{$material->description}} </div></td>
                            <td>{{$material->etat==1?'nouveau':'utilisé'}}</td>
                            <td>{{$material->garentie}} ans </td>
                            <td>
                                 {!!Form::open(['action' => ['MaterialInformatiqueController@destroy', $material->ref], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="myFunction('{{$material->ref}}','{{$material->name}}')"  data-toggle="modal" data-target="#exampleModal">
                                    Modifier
                                </button>
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
                                        {!! Form::open(['action' => ['MaterialInformatiqueController@update', $material->ref], 'method' => 'POST']) !!}
                                            <div class="form-group">
                                                {{Form::label('title', 'Name')}}
                                                {{Form::text('name', '', ['id'=>'name' ,'class' => 'form-control', 'placeholder' => 'Title'])}}
                                                {{Form::text('ref', '', ['id'=>'ref' ,'class' => 'form-control', 'placeholder' => 'ref'])}}
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
                            iserer des produits
                        @endif
                        </tbody>
                </table>
            </div>
            <div class="col-md-3">
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
        <script>
        function myFunction(ref,name) {
            console.log('ref');
            document.getElementById('name').value = name;
            document.getElementById('ref').value = ref;
        }
        // $('#myModal').on('shown.bs.modal', function () {
        //     $('#myInput').trigger('focus')
        // })
    </script>
    </div>
@endsection