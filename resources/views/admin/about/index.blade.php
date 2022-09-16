@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <h2 style="margin:15px;">About</h2>
            <a href="{{route('add.about')}}"><button class="btn btn-info" style="margin: 15px;">Add About</button></a>
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
                        All About
                    </div>
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col" width="10%" >SL No</th>
                                <th scope="col" width="15%">About Title</th>
                                <th scope="col"width="25%" >Short Description</th>
                                <th scope="col"width="15%" >Long Description</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($about as $about)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$about->title}}</td>
                                <td>{{$about->short_desc}}</td>
                                <td>{{$about->long_desc}}</td>
                                

                                <td>
                                    <a href="{{url('about/edit/'.$about->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('about/delete/'.$about->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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