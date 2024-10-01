function atualizaTabela(data) {
    let tableBody = document.querySelector('table tbody');
    let theadBody = document.querySelector('thead tr');
    let themeBody = document.querySelector('h2');
    tableBody.innerHTML = '';

    themeBody.innerHTML = `
        <span class="text-primary">${String(data.length).padStart(2, '0')}</span>
        <span> AVES NO NINHO</span>
    `;

    theadBody.innerHTML = `
        <th class="py-2 text-center px-4 w-2/12">Nome</th>
        <th class="py-2 text-center px-4 w-2/12">Anilha</th>
        <th class="py-2 text-center px-4 w-2/12">Entrada</th>
    `;

    data.forEach(function(item) {
        let row = '';

        row = `<tr class="clickable-row" 
            data-id="${item.anilha_cadastrada ? item.anilha_cadastrada.id : 'N/A'}" 
            data-name="${item.anilha_cadastrada ? item.anilha_cadastrada.nome : 'N/A'}" 
            data-codigo="${item.anilha_cadastrada ? item.anilha_cadastrada.numero_anilha : 'N/A'}" 
            data-updated-at="${item.updated_at ? new Date(item.updated_at).toLocaleString() : 'N/A'}" 
            style="cursor: pointer;" 
            onmouseover="this.style.backgroundColor='#cce4ff';" 
            onmouseout="this.style.backgroundColor='';">
            <td class="py-2 px-4 border-b border-gray-300 text-center">${item.anilha_cadastrada ? item.anilha_cadastrada.nome : 'N/A'}</td>
            <td class="py-2 px-4 border-b border-gray-300 text-center">${item.anilha_cadastrada ? item.anilha_cadastrada.numero_anilha : 'N/A'}</td>
            <td class="py-2 px-4 border-b border-gray-300 text-center">${item.updated_at ? new Date(item.updated_at).toLocaleString() : 'N/A'}</td>
        </tr>`;

        tableBody.innerHTML += row;
    });    
}

function recarregarTabela() {
    fetch('/registroReload')
    .then(response => response.json())
    .then(data => {
        atualizaTabela(data);
    })
    .catch(error => console.error('Erro ao atualizar a tabela:', error));
}

recarregarTabela();
setInterval(recarregarTabela, 10000);