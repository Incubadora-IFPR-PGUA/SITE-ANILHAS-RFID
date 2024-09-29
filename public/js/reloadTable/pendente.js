function atualizaTabela(data) {
    let tableBody = document.querySelector('table tbody');
    let theadBody = document.querySelector('thead tr');
    tableBody.innerHTML = '';

    if (data.length === 0) {
        theadBody.innerHTML = '';
        tableBody.innerHTML = `
            <tr>
                <td colspan="3" class="py-6 text-lg text-gray-600 text-center">Nenhum registro pendente foi encontrado.</td>
            </tr>
        `;
        return;
    }
    
    theadBody.innerHTML = `
        <th class="py-2 text-center px-4 w-5/12">Nome</th>
        <th class="py-2 text-center px-4 w-2/12">Anilha</th>
    `;

    data.forEach(function(item) {
        let row = `<tr class="clickable-row" 
                data-id="${item.id}" 
                data-name="${item.nome}" 
                data-codigo="${item.numero_anilha}" 
                style="cursor: pointer;" 
                onmouseover="this.style.backgroundColor='#cce4ff';" 
                onmouseout="this.style.backgroundColor='';">
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.nome}</td>
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.numero_anilha}</td>
            </tr>`;

        tableBody.innerHTML += row;
    });

    let currentId;

    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const codigo = this.getAttribute('data-codigo');
            const id = this.getAttribute('data-id');
            currentId = id;

            const viewForm = document.getElementById('viewForm');
            const editForm = document.getElementById('editForm');
            const btViewEdit = document.getElementById('btViewEdit');
            const btViewDelete = document.getElementById('btViewDelete');
            const btViewAccept = document.getElementById('btViewAccept');

            viewForm.action = `/pendenteDelete/${id}`;
            editForm.action = `/pendenteUpdate/${id}`;
            btViewAccept.style.display = 'inline';

            editForm.style.display = 'none';
            viewForm.style.display = 'block';
            btViewDelete.style.display = 'inline';
            btViewEdit.style.display = 'inline';

            document.getElementById('viewName').value = name;
            document.getElementById('viewCodigo').value = codigo;
            
            const btCancelEdit = document.getElementById('btCancelEdit');
            const btSalvar = document.getElementById('btSalvar');
    
            const modal = new bootstrap.Modal(document.getElementById('MyModal'));
            modal.show();
            
            btViewEdit.addEventListener('click', () => {
                viewForm.style.display = 'none';
                editForm.style.display = 'block';
                btViewDelete.style.display = 'none';
                btViewEdit.style.display = 'none';
                btViewAccept.style.display = 'none';
                btCancelEdit.style.display = 'inline';
                btSalvar.style.display = 'inline';
                document.getElementById('editName').value = name;
                document.getElementById('editCodigo').value = codigo;
            });
            
            btCancelEdit.addEventListener('click', () => {
                viewForm.style.display = 'block';
                editForm.style.display = 'none';
                btCancelEdit.style.display = 'none';
                btSalvar.style.display = 'none';
                btViewDelete.style.display = 'inline';
                btViewEdit.style.display = 'inline';
                btViewAccept.style.display = 'inline';
                document.getElementById('viewName').value = name;
                document.getElementById('viewCodigo').value = codigo;
            });

            btViewAccept.addEventListener('click', () => {
                const url = `/aceitarPendente/${currentId}`;
                
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (response.ok){
                        modal.hide();
                        reloadTable();
                    }
                })
                .catch(error => {
                    console.error('Erro ao aceitar o registro:', error);
                    alert('Erro ao aceitar o registro.');
                });
            });
        });    
    });    
}

function recarregarTabela() {
    fetch('/pendenteReload')
    .then(response => response.json())
    .then(data => {
        atualizaTabela(data);
    })
    .catch(error => console.error('Erro ao atualizar a tabela:', error));
}

recarregarTabela();
setInterval(recarregarTabela, 10000);