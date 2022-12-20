<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container d-flex">
            <img style="height: 50px;" src="{{asset('images/blogo.png')}}" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="align-items-center">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{route('blog.index')}}">Home</a>
                        <a class="nav-link" aria-current="page" href="{{route('blog.create')}}">Add Article</a>
                        <a class="nav-link" aria-current="page" href="{{route('product.index')}}">Products</a>
                    </div>
                </div>
            </div>
            <div>
                <!-- @if(session()->has('logged')) -->
                    <a class="btn btn-danger" href="/logout">logout</a>
                <!-- @else -->
                    <a class="btn btn-success" href="/login">login</a>
                <!-- @endif -->
            </div>
        </div>
    </nav>