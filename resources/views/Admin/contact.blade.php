@extends('Admin.admin')
<title>Tafilalet Bureaux | Contacts</title>
@section('adminContent')
    <div class="container mx-auto  my-4 ">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>UserName</th>
                    <th>email</th>
                    <th>message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td><img src="/images/user.svg" class="rounded-50" alt="userIcon" srcset=""></td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->message}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>
@endsection