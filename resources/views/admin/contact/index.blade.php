@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <h2 style="margin:15px;">Contact Profile</h2>
            <a href="{{route('add.contact')}}"><button class="btn btn-info" style="margin: 15px;">Add Contact</button></a>
            <div class="col-md-12">
                <div class="card">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="card-header">
                        All Contact
                    </div>
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col" width="5%" >No</th>
                                <th scope="col" width="15%">Address</th>
                                <th scope="col"width="25%" >Email</th>
                                <th scope="col"width="15%" >Phone Number</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                

                                <td>
                                    <a href="{{url('contact/edit/'.$contact->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('contact/delete/'.$contact->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection