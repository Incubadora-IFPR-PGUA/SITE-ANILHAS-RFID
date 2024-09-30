function atualizaTabela(data) {
    let tbody = document.querySelector('tbody');
    tbody.innerHTML = '';

    data.forEach(item => {
        let date = new Date(item.data_hora_captura);
        let formattedDate = date.toLocaleString('pt-BR', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
        });

        let latitude = item.macAddress_esp.latitude;
        let longitude = item.macAddress_esp.longitude;

        let hour = date.getHours();
        let permitido;

        if (hour >= 18) {
            permitido = 'Não';
        } else if (hour >= 9) {
            permitido = 'Sim';
        } else {
            permitido = 'Não';
        }

        let row = `
            <tr class="text-center clickable-row" style="cursor: pointer;" 
                onmouseover="this.style.backgroundColor='#cce4ff';" 
                onmouseout="this.style.backgroundColor='';" 
                onclick="abrirModal('${item.MAC}', '${item.fabricante}', '${latitude}', '${longitude}')">
                <td class="py-2 px-4 border-b">${formattedDate}</td>
                <td class="py-2 px-4 border-b ${permitido === 'Sim' ? 'text-success' : 'text-danger'}">
                    ${permitido}
                </td>
                <td class="py-2 px-4 border-b">${item.macAddress_esp.id}</td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

function abrirModal(mac, fabricante, latitude, longitude) {
    document.getElementById('mac').value = mac;
    document.getElementById('fabric').value = fabricante;

    const mapFrame = document.getElementById('mapFrame');
    const googleMapsUrl = `https://www.google.com/maps/embed/v1/view?key=${GOOGLE_MAPS_API_KEY}&center=${latitude},${longitude}&zoom=14`;
    mapFrame.src = googleMapsUrl;

    const modal = new bootstrap.Modal(document.getElementById('MyModal'));
    modal.show();
}

function recarregarTabela() {
    fetch('/macaddressReload')
    .then(response => response.json())
    .then(data => {
        atualizaTabela(data);
    })
    .catch(error => console.error('ERRO AO ATUALIZAR A TABELA:', error));
}

recarregarTabela();
setInterval(recarregarTabela, 10000);