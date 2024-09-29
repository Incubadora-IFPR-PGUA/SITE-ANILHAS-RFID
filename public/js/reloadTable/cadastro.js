function atualizaTabela(data) {
    let tableBody = document.querySelector('table tbody');
    let theadBody = document.querySelector('thead tr');
    tableBody.innerHTML = '';

    if (data.length === 0) {
        theadBody.innerHTML = '';
        tableBody.innerHTML = `
            <tr>
                <td colspan="3" class="py-6 text-lg text-gray-600 text-center">Nenhum cadastro foi encontrado.</td>
            </tr>
        `;
        return;
    }
    
    theadBody.innerHTML = `
        <th class="py-2 text-center px-4 w-2/12">Nome</th>
        <th class="py-2 text-center px-4 w-2/12">Anilha</th>
    `;

    data.forEach(function(item) {
        let row = `
            <tr class="clickable-row" data-id="${item.id}" data-name="${item.nome}" data-codigo="${item.numero_anilha}" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#cce4ff';" onmouseout="this.style.backgroundColor='';">
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.nome}</td>
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.numero_anilha}</td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });

    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const codigo = this.getAttribute('data-codigo');
            const id = this.getAttribute('data-id');

            const viewForm = document.getElementById('viewForm');
            const editForm = document.getElementById('editForm');
            const btViewEdit = document.getElementById('btViewEdit');
            const btViewDelete = document.getElementById('btViewDelete');

            viewForm.action = `/cadastroDelete/${id}`;
            editForm.action = `/cadastroUpdate/${id}`;

            editForm.style.display = 'none';
            viewForm.style.display = 'block';
            btViewDelete.style.display = 'inline';
            btViewEdit.style.display = 'inline';

            document.getElementById('viewName').value = name;
            document.getElementById('viewCodigo').value = codigo;

            const btCancelEdit = document.getElementById('btCancelEdit');

            const modal = new bootstrap.Modal(document.getElementById('MyModal'));
            modal.show();

            btViewEdit.addEventListener('click', () => {
                viewForm.style.display = 'none';
                editForm.style.display = 'block';
                btViewDelete.style.display = 'none';
                btViewEdit.style.display = 'none';
                btCancelEdit.style.display = 'inline';
                btSalvar.style.display = 'inline';
                document.getElementById('editName').value = name;
                document.getElementById('editCodigo').value = codigo;
            });

            btCancelEdit.addEventListener('click', () => {
                viewForm.style.display = 'block';
                editForm.style.display = 'none';
                btCancelEdit.style.display = 'none';
                btViewDelete.style.display = 'inline';
                btViewEdit.style.display = 'inline';

                document.getElementById('viewName').value = name;
                document.getElementById('viewCodigo').value = codigo;
            });
        });
    });
}

function recarregarTabela() {
    fetch('/cadastroReload')
    .then(response => response.json())
    .then(data => {
        atualizaTabela(data);
    })
    .catch(error => console.error('Erro ao atualizar a tabela:', error));
}

recarregarTabela();
setInterval(recarregarTabela, 10000);