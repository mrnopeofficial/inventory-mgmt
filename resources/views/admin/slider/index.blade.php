@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <h2>Slider</h2>
            <a href=""> <button class="btn btn-info">Add Slider</button></a>
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
                        All Slider
                    </div>
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Slider Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @php($i=1) -->
                            @foreach($sliders as $slider)
                            <tr>
                                <th scope="row">{{$sliders->firstItem()+$loop->index}}</th>
                                <td>{{$sliders->title}}</td>
                                <td>{{$sliders->description}}</td>
                                <td><img src="{{asset($sliders->image)}}" style="max-height: 60px; max-width: 60px;" alt=""></td>

                                <td>
                                    <a href="{{url('slider/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('slider/delete/'.$brand->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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