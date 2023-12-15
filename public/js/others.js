function others(data) {
    divs = `<div class="col-7" id="result_table"></div><div class="col-5" id="result_data"></div>`;
            resultadosDiv.innerHTML = divs;
            resultTableDive = document.getElementById('result_table');
            resultDataDive = document.getElementById('result_data');

            if (data.link.length > 0) {
                var tableLink = `<table class="table table-striped table-dark">
                    <thead>
                            <tr>
                                <th colspan="14">Links</th>
                            </tr>
                            <tr>
                                <th colspan="2">#</th>
                                <th colspan="2">Name/Tipo</th>
                                <th colspan="2">Download</th>
                                <th colspan="2">Tamanho</th>
                                <th colspan="2">Seeders</th>
                                <th colspan="2">Snatched</th>
                                <th colspan="2">Leechers</th>
                            </tr>
                        </thead>
                    <tbody>`;
                for (var i = 0; i < data.link.length; i++) {
                    tableLink += `<tr>
                        <td>${i}<td>
                        <td><a href="${data.link[i].url}" download>${data.link[i].name}</a><td>
                        <td><a href="${data.link[i].url}" download><img src="${data.downloadIcon}" class="download" title="Download"></a><td>
                        <td>${data.link[i].size}<td>
                        <td>${data.link[i].seeders}<td>
                        <td>${data.link[i].snatched}<td>
                        <td>${data.link[i].leechers}<td>
                        <tr>`;
                }

                tableLink += `</tbody></table>`;
                resultTableDive.innerHTML += tableLink;
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

            if (data.cove != '') {
                resultDataDive.innerHTML += `<div class="row"> <img src="${data.cove}" class="col-6 cove"> </div>`;
            }

            var tableData ='<table class="table table-striped table-dark"><tbody>';
            
            if (data.name != '') {
                tableData += `<tr><td>Name:</td><td>${data.name}</td></tr>`;
            }

            if (data.creator != '') {
                tableData += `<tr><td>Criador:</td><td>${data.cast}</td></tr>`;
            }

            if (data.year != '') {
                tableData += `<tr><td>Ano:</td><td>${data.duration}</td></tr>`;
            }

            tableData +=  '</tbody></table>';
            resultDataDive.innerHTML += tableData;
}