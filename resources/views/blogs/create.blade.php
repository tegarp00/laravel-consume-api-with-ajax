@extends('blogs.templatesblog')
@section('blogs')
    <div class="container">
        <div class="row">
            <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Add Article
                </div>
                <div class="card-body">
                    <form action="{{route('blog.post')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Article</label>
                            <textarea name="article" id="editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="file" aria-describedby="file" aria-label="Upload" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection