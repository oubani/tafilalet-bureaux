@extends('admin.admin')
@section('adminContent')
    <div class="row my-2">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark" >
                    <tr>
                        <th scope="col" >Image</th>
                        <th scope="col">status</th>
                        <th scope="col">Afficher</th>
                        <th scope="col">Masquer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                    <tr>
                        <td> <img src="/images/{{$slide->image}}" alt=" Slide" width="50%" > </td>
                        <td> <i class="fa fa-eye{{$slide->state==0 ?'-slash':' '}} " aria-hidden="true"></i> </td>
                        <td>
                            @if ($slide->state==0)
                                <a href="/slide/{{$slide->id}}/edit" class="btn btn-primary">afficher</a> 
                            @endif
                        </td>
                        <td>
                            @if ($slide->state==1)
                            <a href="/slide/{{$slide->id}}/edit" class="btn btn-warning">masquer</a> 
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $slides->links() }}
        </div>
        <div class="col-md-4">
            {{-- 
            <i class="fa fa-eye-slash" aria-hidden="true"></i> --}}
            <form class="card text-white bg-dark px-4 pt-3" enctype="multipart/form-data"  method="POST" action="/slide" >
                @csrf
                <div class="form-group ">
                    <label for="exampleFormControlFile1">Selectionner L'image pour le slider</label>
                    <input type="file" name="image" class="py-3">
                    
                    <br>
                    <input type="submit" value="Ajouter" class="btn btn-primary btn-block">
                </div>
              </form>
        </div>
    </div>
@endsection