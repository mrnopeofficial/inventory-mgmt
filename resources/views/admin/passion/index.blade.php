@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <h2 style="margin:15px;">Passion</h2>
            <a href="{{route('add.passion')}}"><button class="btn btn-info" style="margin: 15px;">Add Passion</button></a>
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
                        All Passion
                    </div>
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col" width="10%" >No</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col"width="15%" >Description</th>
                                <th scope="col"width="20%" >Story</th>
                                <th scope="col"width="15%" >Image</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($passions as $passion)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$passion->title}}</td>
                                <td>{{$passion->description}}</td>
                                <td>{{$passion->story}}</td>
                                <td><img src="{{asset($passion->image)}}" style="max-height: 60px; max-width: 60px;" alt=""></td>

                                <td>
                                    <a href="{{url('passion/edit/'.$passion->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('passion/delete/'.$passion->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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