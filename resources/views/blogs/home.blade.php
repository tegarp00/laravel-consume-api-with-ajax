@extends('blogs.templatesblog')
@section('blogs')

<div class="container">
    <div class="row">
        @foreach($article as $article)
        <div class="col-4">
            <div class="card">
                <img src="{{Storage::url($article->file)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $article->title ?></h5>
                    <p class="card-text"><?= Str::of($article->article)->limit(160) ?></p>
                    <div>
                        <a href="{{route('blog.detail', $article->id)}}" class="btn btn-sm btn-secondary mb-3">Read Post
                        <img style="height: 13px;" src="{{asset('images/icons/arrow-keatas.svg')}}" alt=""></a>
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
        @endforeach
    </div>
</div>
@endsection