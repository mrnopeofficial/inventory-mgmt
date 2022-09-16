@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <h2 style="margin:15px;">Service</h2>
            <a href="{{route('add.service')}}"><button class="btn btn-info" style="margin: 15px;">Add service</button></a>
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
                        All Service
                    </div>
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col" width="10%" >SL No</th>
                                <th scope="col" width="15%">Service Title</th>
                                <th scope="col"width="25%" >Description</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($service as $service)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$service->title}}</td>
                                <td>{{$service->description}}</td>                           

                                <td>
                                    <a href="{{url('service/edit/'.$service->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('service/delete/'.$service->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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