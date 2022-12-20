@extends('blogs.templatesblog')
@section('blogs')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <a class="btn btn-warning btn-sm mb-3" style="margin-right: 5px;" href="{{route('blog.edit', $article->id)}}">Update</a>
            <a class="btn btn-danger btn-sm mb-3" href="{{route('blog.delete', $article->id)}}">Delete</a>
            <div class="card">
                <img src="{{Storage::url($article->file)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $article->title ?></h5>
                    <p class="card-text"><?= $article->article ?></p>
                    <div>
                        <a href="{{route('blog.index')}}" class="btn btn-sm btn-secondary mb-3"><img style="height: 13px;margin-right: 5px;" src="{{asset('images/arrow-left.svg')}}" alt="">Back</a>
                    </div>
                    @php
                        $dt = new DateTime($article->created_at);
                        $date = $dt->format('m-d-Y');
                        $time = $dt->format('H:i');
                    @endphp
                    <p class="card-text text-end"><small class="text-muted">Created {{$date}}</small></p>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection