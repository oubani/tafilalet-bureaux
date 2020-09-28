@extends('Admin.admin');
@section('adminContent')
<div class="row">
    <div class="col-md-12 mx-auto ">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Modifier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td> <img width="150px" src="/images/{{$service->image}}" alt="{{$service->title}} image " > </td>
                        <td>{{$service->title}}</td>
                        <td>{{$service->body}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="myFunction('{{$service->id}}','{{$service->title}}','{{$service->body}}','{{$service->image}}')" data-toggle="modal" data-target="#exampleModal">
                                Modifier
                            </button> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/services" method="post" enctype="multipart/form-data" >
            @csrf
              <div class="form-group">
                  <input type="hidden" value=" " id="id" name="id" required >
                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" value=" " required class="form-control">
              </div>
              <div class="form-group">
                  <label for="body">Description</label>
                  <input type="text" name="body" id="body" value=" " required class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">image</label>
                <input type="file" name="image" class="form-control-file" value=" " id="exampleFormControlFile1">
              </div>
              <input type="submit" value="modifier" class="btn btn-primary btn-block">
          </form>
        </div>
        
      </div>
    </div>
  </div>
    </div>
</div>

<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus');
});
function myFunction(id,title,body,image) {
    document.getElementById("id").value =id;
    document.getElementById("title").value =title;
    document.getElementById("body").value =body;
    document.getElementById("image").value =image;
}
</script>
@endsection