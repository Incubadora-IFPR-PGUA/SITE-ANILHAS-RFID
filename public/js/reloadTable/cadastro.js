function updateTable(data) {
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '';

    if (data.length === 0){
        tbody.innerHTML = `
            <tr>
                <td class="text-center">
                    <h1 class="text-primary">NÃO HÁ NENHUMA ANILHA CADASTRADA!!</h1>
                </td>
            </tr>
        `;
    } else {
        data.forEach(item => {
            let row = `
                <tr class="text-center clickable-row" style="cursor: pointer;" 
                    onmouseover="this.style.backgroundColor='#cce4ff';" 
                    onmouseout="this.style.backgroundColor='';" 
                    onclick="openModal('${item.name}', '${item.codigo}', '${item.id}')">
                    <td class="py-2 px-4 border-b">${item.name}</td>
                    <td class="py-2 px-4 border-b">${item.codigo}</td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    }
}

function openModal(name, codigo, id) {
    const modalNameInput = document.getElementById('modalName');
    const modalCodigoInput = document.getElementById('modalCodigo');
    modalNameInput.value = name;
    modalCodigoInput.value = codigo;

    document.getElementById('deleteButton').onclick = function() {
        const codigo = document.getElementById('modalCodigo').value; // Obtém o código do input
    
        if (confirm('Tem certeza que deseja excluir?')) {
            fetch(`/cadastroDelete/${codigo}`, { // Inclui o ID na URL
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao excluir');
                }
                return response.json();
            })
            .then(data => {
                alert('Excluído com sucesso!');
                $('#editModal').modal('hide');
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao excluir!');
            });
        }
    };    

    document.getElementById('saveButton').onclick = function() {
        const nome = document.getElementById('modalName').value; // Obtém o nome do input
        const codigo = document.getElementById('modalCodigo').value; // Obtém o código do input
    
        fetch(`/cadastroUpdate/${codigo}`, { // Inclui o ID na URL
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ nome }) // Envia apenas o nome, já que o código é o ID
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao atualizar');
            }
            return response.json();
        })
        .then(data => {
            alert('Atualizado com sucesso!');
            $('#editModal').modal('hide');
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao atualizar!');
        });
    };    

    const modal = new bootstrap.Modal(document.getElementById('editModal'));
    modal.show();
}

function reloadTable() {
    let fetchUrl = '/cadastroReload';

    if (fetchUrl) {
        fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            updateTable(data);
        })
        .catch(error => console.error('ERRO AO ATUALIZAR A TABELA:', error));
    }
}

setInterval(reloadTable, 5000);