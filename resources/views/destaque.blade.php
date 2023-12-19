@extends('Templade.default')
@section('head')
<style>
    .page:hover {
        cursor: pointer;
    }
</style>

<style>
        .image-container {
            text-align: center;
        }
        .image-container img {
            width: 182px;
            height: 252px;
        }
        @media (max-width: 768px) {
            .image-container img {
                width: 100%;
                height: auto;
            }
        }
</style>
@endsection

@section('content')
<div id="result"></div>
@endsection

@section('script')
<script>
    function torrangeDestaque() {
        document.getElementById('result').innerHTML = `<img src="{{ asset('img/load.gif') }}" id="load_gif">`;

        var apiUrl = "{{ route('api.destaque') }}";

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (! data.isInLine) {
                    displayResults(data.data);
                } else {
                    let lifeTime = 10000;

                    setTimeout(function() {
                        torrangeDestaque();
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
            let htmlContent = '';
            let limit = 0

            for (let i = 0; i < data.length; i++) {
                if (data[i].group != 0) {
                    
                    if (limit % 5 === 0) {
                
                        htmlContent += i !== 0 ? '</div>' : '';
                        htmlContent += '<div class="row">';
                    }

                    htmlContent += `
                        <div class="col-lg-2 col-md-6 col-12 image-container">
                            <a href="${data[i].link}"><img src="${data[i].img}" alt="${data[i].title}" class="img-fluid"></a>
                            <a href="${data[i].link}"><p>${data[i].title}</p></a>
                        </div>
                    `;
                    limit++;
                }
            }

            htmlContent += '</div>';
            resultadosDiv.innerHTML = htmlContent;
        } else {
            resultadosDiv.innerHTML = '<p style="color: white;">Nenhum destaque encontrado.</p>';
        }
    }

    torrangeDestaque();
</script>
@endsection