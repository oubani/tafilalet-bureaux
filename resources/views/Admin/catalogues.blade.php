@extends('Admin.admin')
@section('adminContent')
    <div class="container">   
        <div class="row mt-3 ">
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" >Cover</th>
                            <th scope="col" >Mois</th>
                            <th scope="col" >Supprimer</th>
                            <th scope="col" >Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogues as $catalogue)
                            <tr>
                                <td><img height="100px" src="/images/{{$catalogue->cover}}" alt="{{$catalogue->mois}}-image-calatalogue" > </td>
                                <td>{{$catalogue->mois}} </td>
                                <td> <a href="/catalogues/{{$catalogue->pdfFile}}"  target="_blank" rel="noopener noreferrer">download</a> </td>
                                <td> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 p-3 card rounded bg-dark text-light ">
                <h4>Ajouter Un Catalogue</h4>
                <form action="/catalogue" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="mois">Mois</label>
                        <input type="text" name="mois" required class="form-control" >
                    </div>

                    <div class="form-group ">
                        <label for="exampleFormControlFile1">Selectionner L'image du cover catalogue </label>
                        <input type="file" name="cover" required class="py-3">
                    </div>

                    <div class="form-group ">
                        <label for="exampleFormControlFile1">Selectionner le fichier pdf du catalogue </label>
                        <input type="file" name="pdfFile" accept="application/pdf" required class="py-3">
                    </div>
                    
                    <input type="submit" value="Ajouter" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
@endsection