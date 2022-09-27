@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <h2 style="margin:15px;">Contact Message</h2>
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
                        All Message
                    </div>
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col" width="5%" >No</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col"width="15%" >Email</th>
                                <th scope="col"width="15%" >Subject</th>
                                <th scope="col"width="25%" >Message</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($contactforms as $contactform)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$contactform->name}}</td>
                                <td>{{$contactform->email}}</td>
                                <td>{{$contactform->subject}}</td>
                                <td>{{$contactform->message}}</td>
                                
                                <td>
                                    <a href="{{url('contactform/delete/'.$contactform->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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