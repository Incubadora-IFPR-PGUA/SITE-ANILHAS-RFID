function updateTable(data) {
    let tbody = document.querySelector('tbody');
    tbody.innerHTML = '';

    data.forEach(item => {
        let date = new Date(item.hora_atualizacao);
        let formattedDate = date.toLocaleString('pt-BR', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
        });

        let row = `
            <tr class="text-center clickable-row" style="cursor: pointer;" 
                onmouseover="this.style.backgroundColor='#cce4ff';" 
                onmouseout="this.style.backgroundColor='';">
                <td class="py-2 px-4 border-b">${formattedDate}</td>
                <td class="py-2 px-4 border-b">${item.umidade_solo}</td>
                <td class="py-2 px-4 border-b">${item.umidade_ar}</td>
                <td class="py-2 px-4 border-b">${item.temperatura_ar}</td>
                <td class="py-2 px-4 border-b">${item.luz_ambiente}</td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

function reloadTable() {
    let fetchUrl = '/hortaReload';

    if (fetchUrl) {
        fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            updateTable(data.data);
        })
        .catch(error => console.error('ERRO AO ATUALIZAR A TABELA:', error));
    }
}

setInterval(reloadTable, 3000);