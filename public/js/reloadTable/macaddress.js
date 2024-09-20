function updateTable(data, type){
    let tbody = document.querySelector('tbody');
    tbody.innerHTML = '';

    data.forEach(item => {
        let row = `
                <tr class="text-center clickable-row" style="cursor: pointer;" 
                    onmouseover="this.style.backgroundColor='#cce4ff';" 
                    onmouseout="this.style.backgroundColor='';" 
                    onclick="openModal('${item.mac}', '${item.fabricante}')">
                    <td class="py-2 px-4 border-b">${item.dataHora}</td>
                    <td class="py-2 px-4 border-b">${item.localizacao}</td>
                    <td class="py-2 px-4 border-b ${item.permitido ? 'text-success' : 'text-danger'}">
                        ${item.permitido ? 'Sim' : 'Não'}
                    </td>
                    <td class="py-2 px-4 border-b">${item.esp}</td>
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
    let tableType = 'mac';

    if (fetchUrl) {
        fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            updateTable(data, tableType);
        })
        .catch(error => console.error('ERRO AO ATUALIZAR A TABELA:', error));
    }
}

setInterval(reloadTable, 1000);