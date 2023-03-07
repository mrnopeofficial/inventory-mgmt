@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <h2 style="margin:15px;">Portfolio</h2>
            <a href="{{route('add.portfolio')}}"><button class="btn btn-info" style="margin: 15px;">Add Portfolio</button></a>
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
                        All Portfolio
                    </div>
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col" width="10%" >No</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col"width="20%" >Task</th>
                                <th scope="col"width="15%" >Result</th>
                                <th scope="col"width="15%" >Logo</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($portfolios as $portfolio)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$portfolio->name}}</td>
                                <td>{{substr($portfolio->task, 0, 70)}}...</td>
                                <td>{{substr($portfolio->result, 0, 25)}}...</td>
                                <td><img src="{{asset($portfolio->image)}}" style="max-height: 60px; max-width: 60px;" alt=""></td>

                                <td>
                                    <a href="{{url('portfolio/edit/'.$portfolio->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('portfolio/delete/'.$portfolio->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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