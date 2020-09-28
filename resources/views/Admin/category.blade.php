@extends('admin.admin')
<title>Tafilalet Bureaux | categories</title>
@section('adminContent')
    <div class="row my-4">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark" >
                    <tr>
                        <th scope="col">Nom Du Catagorie</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $categorie)
                        <tr>
                            <td> {{$categorie->category_name}} </td>
                            <td> 
                                <button type="button" class="btn btn-primary" onclick="myFunction('{{$categorie->id}}','{{$categorie->category_name}}')"  data-toggle="modal" data-target="#exampleModal">
                                    Modifier
                                </button>
                            </td>
                            <td>
                                {!!Form::open(['action' => ['CategoryController@destroy', $categorie->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!} 
                            </td>
                        </tr>
                    @endforeach
                    @else
                        Ajouter des categories
                    @endif
                    
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>

        {{-- lodal start here  --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Modifier Categorie </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => ['CategoryController@update', $categorie->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', '', ['id'=>'title' ,'class' => 'form-control', 'placeholder' => 'Title'])}}
                        {{Form::hidden('id', '', ['id'=>'id' ,'class' => 'form-control', 'placeholder' => 'Title'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Modifier', ['class'=>'btn btn-primary btn-block '])}}
                {!! Form::close() !!}
                <button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">Fermer</button>
            </div>
            </div>
        </div>
        </div>

        <div class="col-md-4">
            <form action="category" class="card bg-dark text-light p-2 shadow pt-3 "  method="POST">
                @csrf
                <div class="form-group">
                    <label for="categoryname">Categorie name </label>
                    <input type="text" class="form-control" name="name" required id="categoryName" placeholder=" Saisez le nom du categorie">
                </div>
                <input type="submit" value="Ajouter" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
        function myFunction(id,title) {
            document.getElementById('title').value = title;
            document.getElementById('id').value = id;
        }
    </script>
@endsection