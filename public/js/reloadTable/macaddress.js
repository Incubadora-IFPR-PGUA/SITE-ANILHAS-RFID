function updateTable(data) {
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
        let googleMapsLink = `https://www.google.com/maps?q=${latitude},${longitude}`;

        let row = `
            <tr class="text-center clickable-row" style="cursor: pointer;" 
                onmouseover="this.style.backgroundColor='#cce4ff';" 
                onmouseout="this.style.backgroundColor='';" 
                onclick="openModal('${item.MAC}', '${item.fabricante}')">
                <td class="py-2 px-4 border-b">${formattedDate}</td>
                <td class="py-2 px-4 border-b">
                    <a href="${googleMapsLink}" target="_blank" class="text-decoration-none">
                        <i class="fas fa-map-marker-alt text-danger"></i> Localização
                    </a> 
                </td>
                <td class="py-2 px-4 border-b ${item.permitido ? 'text-success' : 'text-danger'}">
                    ${item.permitido ? 'Sim' : 'Não'}
                </td>
                <td class="py-2 px-4 border-b">${item.macAddress_esp.id}</td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

function openModal(mac, fabricante) {
    document.getElementById('mac').value = mac;
    document.getElementById('fabric').value = fabricante;
    const modal = new bootstrap.Modal(document.getElementById('MyModal'));
    modal.show();
}

function reloadTable() {
    let fetchUrl = '/macaddressReload';

    if (fetchUrl) {
        fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            updateTable(data);
        })
        .catch(error => console.error('ERRO AO ATUALIZAR A TABELA:', error));
    }
}

reloadTable();
setInterval(reloadTable, 10000);