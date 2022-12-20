@extends('belog.template')
@section('content')

<div class="container">
    <div class="row" id="blogs">
        
    </div>
</div>

<script>

function limit(string = '', limit = 0) {
    return string.substring(0, limit)
}

    $.ajax({
        url: "http://localhost:8000/api/article/list",
        method: "GET",
        dataType: "json",
        success: response => {
            let listArticle = response.data
            let html = ""
            
            for(article of listArticle) {
                // let tgl = new Date(article.created_at)
                let tgl = new Date(article.created_at).toISOString().replace('-', '/').split('T')[0].replace('-', '/');
                html += `
                <div class="col-4">
                <div class="card">
                    <img src="http://localhost:8000/storage/${article.file}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">${article.title}</h5>
                        <p class="card-text">${limit(article.article, 200)} ...</p>
                        <div>
                            <a href="" class="btn btn-sm btn-secondary mb-3">Read Post
                            <img style="height: 13px;" src="" alt=""></a>
                        </div>
                        <p class="card-text text-end"><small class="text-muted">Created ${tgl}</small></p>
                    </div>
                </div> 
                </div>
            `
            }
            $("#blogs").append(html)
        }
    })
</script>

@endsection
