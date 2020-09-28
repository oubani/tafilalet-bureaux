@extends('admin.admin')
@section('adminContent')
    <div class="container ">
        <div style="width: 100%;text-align:center" class="bg-dark my-2 p-4 text-warning " > {{$page}} Liste </div>
        <table class="table" >
            <thead class="thead-dark">
                <tr>
                    <th>name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>phone</th>
                    <th></th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td> 
                            @if ($user->role==0)
                                <form action="users" method="post">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{$user->id}}">
                                    <input type="submit" value="Upgrade" name="upgrade" class="btn btn-primary">
                                </form>
                                @else
                                <form action="users" method="post">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{$user->id}}">
                                    <input type="submit" value="downgrade" name="downgrade" class="btn btn-warning">
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>   
        </table>
        {{ $users->links() }}
    </div>
@endsection