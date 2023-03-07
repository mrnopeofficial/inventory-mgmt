@extends('admin.admin_master')
@section('admin')
<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Project</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.portfolio')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Project Name</label>
                    <input name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter project title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Project Link</label>
                    <input name="link" class="form-control" id="exampleFormControlInput1" placeholder="Enter project title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Project Task</label>
                    <textarea name="task" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Project Result</label>
                    <textarea name="result" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Project Logo</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection