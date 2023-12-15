@extends('Templade.default')
@section('head')
<style>
    .page:hover {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<img src="{{ asset('storage/Logo/torange.png') }}" alt="Logo da Empresa" class="mb-4 logo" id="logo">
<img src="{{ asset('storage/Logo/torange_triste.png') }}" alt="Logo da Empresa" class="mb-4 logo" id="logo_triste">
<div class="input-group mb-3 justify-content-center">
    <input type="text" class="form-control col-md-4" id="searchInput" placeholder="Digite sua busca">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" class="logo" id="searchButton">Buscar</button>
    </div>
</div>
<div class="page" class="col-12"></div>
<div id="resultados" class="mt-5"></div>
<div class="page" class="col-12"></div>
@endsection

@section('script')
<script>
    function displayResults(data, searchUrl) {
        var routeTorrange = "{{ route('web.torrents', ['id' => '__termo__']) }}";

        var resultadosDiv = document.getElementById('resultados');
        var resultadosPage = document.getElementsByClassName('page');
        resultadosDiv.innerHTML = '';
        resultadosPage[0].innerHTML = '';
        resultadosPage[1].innerHTML = '';

        if (data.ids && data.ids.length > 0) {
            document.getElementById('logo').style.display = 'block';
            document.getElementById('logo_triste').style.display = 'none';

            var table = `<table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Icone</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Lançado há</th>
                            <th scope="col">Tamanho</th>
                            <th scope="col">snatched</th>
                            <th scope="col">seeders</th>
                            <th scope="col">leechers</th>
                        </tr>
                    </thead>
                    <tbody>`;

            for (var i = 0; i < data.ids.length; i++) {
                var url = routeTorrange.replace('__termo__', encodeURIComponent(data.ids[i]));

                table += `<tr>
                    <th scope="row"><img src="${data.icon[i]}" alt="Icone" with="50px"></th>
                    <td><a href="${url}?type=${data.type[i]}"> ${data.name[i]} </a></td>
                    <td>${data.date[i]}</td>
                    <td>${data.size[i]}</td>
                    <td>${data.snatched[i]}</td>
                    <td>${data.seeders[i]}</td>
                    <td>${data.leechers[i]}</td>
                  </tr>`;
            }

            if (data.pages && data.pages.total > 0) {
                nav = `<nav aria-label="Page navigation example"> <ul class="pagination justify-content-center">`;
                previous = `<li class="page-item disabled"> <a class="page-link">Previous</a></li>`;
                first = `<li class="page-item disabled"> <a class="page-link"><<</a> </li>`;

                if (data.pages.previous) {
                    previous = `<li class="page-item"> <a class="page-link" onclick="serchApi(${data.pages.previous})">Previous</a></li>`;
                }

                if (data.pages.first) {
                    first = `<li class="page-item"><a class="page-link" onclick="serchApi(${data.pages.first})"><<</a></li>`;
                }

                nav += first;
                nav += previous;
                next = `<li class="page-item disabled"> <a class="page-link">Next</a> </li>`;
                last = `<li class="page-item disabled"> <a class="page-link">>></a> </li>`;


                for (var i = 0; i < data.pages.total; i++) {
                    nav += `<li class="page-item"><a class="page-link" onclick="serchApi(${data.pages.all[i]})">${data.pages.all[i]}</a></li>`;
                }

                if (data.pages.next) {
                    next = `<li class="page-item"><a class="page-link" onclick="serchApi(${data.pages.next})">Next</a></li>`;
                }

                if (data.pages.last) {
                    last = `<li class="page-item"><a class="page-link" onclick="serchApi(${data.pages.last})">>></a></li>`;
                }

                nav += next;

                nav += last;
                resultadosPage[0].innerHTML = nav;
                resultadosPage[1].innerHTML = nav;
            }

            table += `</tbody></table>`;
            resultadosDiv.innerHTML = table;
        } else {
            document.getElementById('logo_triste').style.display = 'block';
            document.getElementById('logo').style.display = 'none';

            resultadosDiv.innerHTML = '<p style="color: white;">Nenhum resultado encontrado.</p>';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        if ("{{$serch}}" != '') {
            document.getElementById('searchInput').value = "{{$serch}}";
            serchApi();

        }
        document.getElementById('searchButton').addEventListener('click', function() {
            serchApi();
        });
    });
    
    function serchApi(page = false) {
        document.getElementById('resultados').innerHTML = `<img src="{{ asset('img/load.gif') }}" id="load_gif">`;
        var searchValue = document.getElementById('searchInput').value;
        var apiUrl = "{{ route('api.search', ['search' => '__termo__']) }}";
        var searchUrl = apiUrl.replace('__termo__', encodeURIComponent(searchValue));

        if (page) {
            searchUrl += `?page=${page}`;
        }

            fetch(searchUrl, {
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (! data.isInLine) {
                    displayResults(data.data, searchUrl);
                } else {
                    let lifeTime = 10000;

                    setTimeout(function() {
                        serchApi(page);
                    }, lifeTime);
                }
            })
            .catch(error => {
                displayResults([]);
            });
    }
</script>
@endsection