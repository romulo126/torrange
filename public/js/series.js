function series(data) {
            divs = `<div class="col-7" id="result_table"></div><div class="col-5" id="result_data"></div>`;
            resultadosDiv.innerHTML = divs;
            resultTableDive = document.getElementById('result_table');
            resultDataDive = document.getElementById('result_data');
            

            if (Object.keys(data.dubbed).length > 0) {
                var tableDubbed = `<table colspan="12" class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th colspan="12">Dual Áudio</th>
                        </tr>
                        <tr>
                            <th colspan="2">Qualidade</th>
                            <th colspan="2">Download</th>
                            <th colspan="2">Tamanho</th>
                            <th colspan="2">Seeders</th>
                            <th colspan="2">Snatched</th>
                            <th colspan="2">Leechers</th>
                        </tr>
                        </thead>`;
                for (let [key, value] of Object.entries(data.dubbed)) {
                    tableDubbed += `<thead>
                        <tr>
                            <th colspan="12">${key}</th>
                        </tr>
                        </thead><tbody>`;
                    for (var i = 0; i < value.name.length; i++) {
                        tableDubbed += `<tr>
                            <td><a href="${value.links[i]}?size=${value.size[i]}" download>${value.name[i]}</a><td>
                            <td><a href="${value.links[i]}?size=${value.size[i]}" download><img src="${data.downloadIcon}" class="download" title="Download"></a><td>
                            <td>${value.size[i]}<td>
                            <td>${value.seeders[i]}<td>
                            <td>${value.snatched[i]}<td>
                            <td>${value.leechers[i]}<td>
                        </tr>`;
                    }
                    tableDubbed += `</tbody>`;
                }
                tableDubbed += `</tbody></table>`;
                resultTableDive.innerHTML += tableDubbed;
            }

            if (Object.keys(data.subtitled).length > 0) {
                var tableSubtitled = `<table colspan="14" class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th colspan="12">Legendado</th>
                        </tr>
                        <tr>
                            <th colspan="2">Qualidade</th>
                            <th colspan="2">Download</th>
                            <th colspan="2">Tamanho</th>
                            <th colspan="2">Seeders</th>
                            <th colspan="2">Snatched</th>
                            <th colspan="2">Leechers</th>
                        </tr>
                        </thead>`;
                for (let [key, value] of Object.entries(data.subtitled)) {
                    tableSubtitled += `<thead>
                        <tr>
                            <th colspan="12">${key}</th>
                        </tr>
                        </thead><tbody>`;
                    for (var i = 0; i < value.name.length; i++) {
                        tableSubtitled += `<tr>
                            <td><a href="${value.links[i]}?size=${value.size[i]}" download>${value.name[i]}</a><td>
                            <td><a href="${value.links[i]}?size=${value.size[i]}" download><img src="${data.downloadIcon}" class="download" title="Download"></a><td>
                            <td>${value.size[i]}<td>
                            <td>${value.seeders[i]}<td>
                            <td>${value.snatched[i]}<td>
                            <td>${value.leechers[i]}<td>
                        </tr>`;
                    }
                    tableSubtitled += `</tbody>`;
                }
                tableSubtitled += `</tbody></table>`;
                resultTableDive.innerHTML += tableSubtitled;
            }

            if (data.description != '') {
                var tableDescription = `<table class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th colspan="12">Descrição</th>
                        </tr>
                        </thead>
                    <tbody>`;
                
                tableDescription += `<tr> <td> ${data.description} </td> <tr>`;
                resultTableDive.innerHTML += tableDescription;
            }

            if (data.youtube != '') {
                var tableYoutube = `<table class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th colspan="12">Youtube</th>
                        </tr>
                        </thead>
                    <tbody>`;
                
                    tableYoutube += `<tr> <td> <iframe class="youtube" src="${data.youtube}" allowfullscreen=""></iframe> </td> <tr>`;
                resultTableDive.innerHTML += tableYoutube;
            }

            if (data.images.length > 0) {
                var tableImages = `<table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th colspan="12">Imagens</th>
                    </tr>
                    </thead>
                <tbody>`;

                for (var i = 0; i < data.images.length; i++) {
                    tableImages += `<tr>`;
                    tableImages += `<td><img src="${data.images[i]}" class="col-6"><td>`;
                    tableImages += `</tr>`;
                }

                resultTableDive.innerHTML += tableImages;
            }

            var tableData ='<table class="table table-striped table-dark"><tbody>';

            if (data.cove != '') {
                resultDataDive.innerHTML += `<div class="row"> <img src="${data.cove}" class="col-6 cove "> </div>`;
            }

            if (data.name != '') {
                tableData += `<tr><td>Name:</td><td>${data.name}</td></tr>`;
            }

            if (data.cast != '') {
                tableData += `<tr><td>Elenco:</td><td>${data.cast}</td></tr>`;
            }

            if (data.duration != '') {
                tableData += `<tr><td>Duração:</td><td>${data.duration}</td></tr>`;
            }

            tableData +=  '</tbody></table>';
            resultDataDive.innerHTML += tableData;
}