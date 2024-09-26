function updateTable(data, type) {
    let tableBody = document.querySelector('table tbody');
    let theadBody = document.querySelector('thead tr');
    let themeBody = document.querySelector('h2');
    tableBody.innerHTML = '';

    if (type === 'registro') {
        themeBody.innerHTML = `
            <span class="text-primary">${String(data.length).padStart(2, '0')}</span>
            <span> AVES NO NINHO</span>
        `;
    }

    if (data.length === 0) {
        theadBody.innerHTML = '';
        tableBody.innerHTML = `
            <tr>
                <td colspan="3" class="py-6 text-lg text-gray-600 text-center">Nenhuma anilha foi encontrada.</td>
            </tr>
        `;
        return;
    } else {
        if (type === 'registro') {
            theadBody.innerHTML = `
                <th class="py-2 text-center px-4 w-2/12">Nome</th>
                <th class="py-2 text-center px-4 w-2/12">Anilha</th>
                <th class="py-2 text-center px-4 w-2/12">Entrada</th>
            `;
        } else {
            theadBody.innerHTML = `
                <th class="py-2 text-center px-4 w-5/12">Nome</th>
                <th class="py-2 text-center px-4 w-2/12">Anilha</th>
            `;
        }
    }

    data.forEach(function(item) {
        let row = '';

        if (type === 'cadastro' || type === 'pendente') {
            row = `<tr class="clickable-row" data-id="${item.id}" data-name="${item.name}" data-codigo="${item.codigo}" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#cce4ff';" onmouseout="this.style.backgroundColor='';"    >
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.name}</td>
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.codigo}</td>
            </tr>`;
        } else if (type === 'registro') {
            row = `<tr class="clickable-row" data-id="${item.cadastro ? item.cadastro.id : 'N/A'}" data-name="${item.cadastro ? item.cadastro.name : 'N/A'}" data-codigo="${item.cadastro ? item.cadastro.codigo : 'N/A'}" data-updated-at="${item.updated_at ? new Date(item.updated_at).toLocaleString() : 'N/A'}" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#cce4ff';" onmouseout="this.style.backgroundColor='';">
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.cadastro ? item.cadastro.name : 'N/A'}</td>
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.cadastro ? item.cadastro.codigo : 'N/A'}</td>
                <td class="py-2 px-4 border-b border-gray-300 text-center">${item.updated_at ? new Date(item.updated_at).toLocaleString() : 'N/A'}</td>
            </tr>`;
        }        

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

            if (type === 'cadastro'){
                viewForm.action = `/cadastroDelete/${id}`;
                editForm.action = `/cadastroUpdate/${id}`;
                btViewAccept.style.display = 'none';
            } else {
                viewForm.action = `/pendenteDelete/${id}`;
                editForm.action = `/pendenteUpdate/${id}`;
                btViewAccept.style.display = 'inline';
            }

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

                if (type === 'pendente') {
                    btViewAccept.style.display = 'inline';
                }

                document.getElementById('viewName').value = name;
                document.getElementById('viewCodigo').value = codigo;
            });

            if (type === 'pendente') {
                btViewAccept.addEventListener('click', () => {
                    const url = `/pendente/${currentId}`;
                    
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
                            // reloadTable();
                            alert('Cadastro aceito com sucesso!')
                        } else {
                            alert('Erro ao aceitar o cadastro!');
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao aceitar o registro:', error);
                        alert('Erro ao aceitar o registro.');
                    });
                });
            }
        });    
    });    
}

function reloadTable() {
    const pathname = window.location.pathname;
    let fetchUrl = '';
    let tableType = '';

    if (pathname.includes('cadastro')) {
        fetchUrl = '/cadastroReload';
        tableType = 'cadastro';
    } else if (pathname.includes('pendente')) {
        fetchUrl = '/pendenteReload';
        tableType = 'pendente';
    } else if (pathname.includes('registro')) {
        fetchUrl = '/registroReload';
        tableType = 'registro';
    }

    if (fetchUrl) {
        fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            updateTable(data, tableType);
        })
        .catch(error => console.error('Erro ao atualizar a tabela:', error));
    }
}

reloadTable();
setInterval(reloadTable, 10000);