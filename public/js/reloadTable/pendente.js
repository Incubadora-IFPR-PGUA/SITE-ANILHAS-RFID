// function updateAnilhaTable(data) {
//     let tbody = document.querySelector('tbody');
//     tbody.innerHTML = '';

//     data.forEach(item => {
//         let row = `
//             <tr class="text-center clickable-row" style="cursor: pointer;" 
//                 onmouseover="this.style.backgroundColor='#cce4ff';" 
//                 onmouseout="this.style.backgroundColor='';" 
//                 onclick="openViewModal('${item.name}', '${item.codigo}', '${item.id}')">
//                 <td class="py-2 px-4 border-b">${item.name}</td>
//                 <td class="py-2 px-4 border-b">${item.codigo}</td>
//             </tr>
//         `;
//         tbody.innerHTML += row;
//     });
// }

// function openViewModal(name, codigo, id) {
//     currentId = id;
//     document.getElementById('name').value = name;
//     document.getElementById('id').value = codigo;

//     const modal = new bootstrap.Modal(document.getElementById('MyModal'));
//     modal.show();

//     // Aceitar cadastro
//     document.getElementById('acceptBtn').addEventListener('click', () => {
//         const url = `/pendente/${currentId}`;

//         fetch(url, {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             }
//         })
//         .then(response => {
//             if (response.ok) {
//                 modal.hide();
//                 reloadAnilhaTable();
//             }
//         })
//         .catch(error => {
//             console.error('Erro ao aceitar o registro:', error);
//             alert('Erro ao aceitar o registro.');
//         });
//     });

//     // Excluir cadastro
//     document.getElementById('deleteBtn').addEventListener('click', () => {
//         const url = `/pendenteDelete/${currentId}`;

//         fetch(url, {
//             method: 'DELETE',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             }
//         })
//         .then(response => {
//             if (response.ok) {
//                 modal.hide();
//                 reloadAnilhaTable();
//             }
//         })
//         .catch(error => {
//             console.error('Erro ao excluir o registro:', error);
//             alert('Erro ao excluir o registro.');
//         });
//     });
// }

// function reloadAnilhaTable() {
//     let fetchUrl = '/pendenteReload';

//     fetch(fetchUrl)
//         .then(response => response.json())
//         .then(data => {
//             updateAnilhaTable(data);
//         })
//         .catch(error => console.error('ERRO AO ATUALIZAR A TABELA:', error));
// }

// document.getElementById('editName').addEventListener('click', function() {
//     const nameField = document.getElementById('viewName');
//     nameField.disabled = !nameField.disabled;
//     if (!nameField.disabled) {
//         nameField.focus();
//     }
// });

// setInterval(reloadAnilhaTable, 3000);