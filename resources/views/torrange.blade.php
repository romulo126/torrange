@extends('Templade.default')
@section('head')
<style>
    .page:hover {
        cursor: pointer;
    }
</style>
@endsection

@section('content')

<div class="input-group mb-3 justify-content-center">
    <input type="text" class="form-control col-md-4" id="searchInput" placeholder="Digite sua busca">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="searchButton">Buscar</button>
    </div>
</div>
<div id="result" class="row"></div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        torrange();

        function serch() {
            var searchValue = document.getElementById('searchInput').value;
            if (searchValue == '') {
                return;
            }
            var apiUrl = "{{ route('web.serch', ['search' => '__termo__']) }}";
            var searchUrl = apiUrl.replace('__termo__', encodeURIComponent(searchValue));
            window.location.href = searchUrl;
        }

        document.getElementById('searchButton').addEventListener('click', function() {
            serch();
        });
    });
</script>

<script>
    function torrange() {
        document.getElementById('result').innerHTML = `<img src="{{ asset('img/load.gif') }}" id="load_gif">`;

        const id = "{{$id}}";
        var apiUrl = "{{ route('api.torrent', ['id' => '__termo__']) }}";
        var torrangeUrl = apiUrl.replace('__termo__', encodeURIComponent(id));
        torrangeUrl = torrangeUrl + '?type={{$type}}'
        fetch(torrangeUrl)
            .then(response => response.json())
            .then(data => {
                if (! data.isInLine) {
                    displayResults(data.data);
                } else {
                    let lifeTime = 10000;

                    setTimeout(function() {
                        torrange();
                    }, lifeTime);
                }
            })
            .catch(error => {
                displayResults(false);
            });

    }

    function displayResults(data) {
        resultadosDiv = document.getElementById('result');
        resultadosDiv.innerHTML = '';

        if (data) {
            others(data);
        } else {
            resultadosDiv.innerHTML = '<p style="color: white;">Nenhum resultado encontrado.</p>';
        }
    }
</script>
<script src="{{ asset('js/filme.js') }}"></script>
<script src="{{ asset('js/series.js') }}"></script>
<script src="{{ asset('js/others.js') }}"></script>
@endsection