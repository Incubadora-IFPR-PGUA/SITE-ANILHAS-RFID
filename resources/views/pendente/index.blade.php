@extends('home')

@section('conteudo')

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modo de Edicao -->
        <form id="editForm" method="POST" style="display: none;">
          @csrf
          @method('PUT') <!-- Isso definirá o método PUT para a requisição de atualização -->
          <div class="mb-3">
            <label for="editName" class="form-label">Nome</label>
            <input type="text" class="form-control" id="editName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="editCodigo" class="form-label">Anilha</label>
            <input type="text" class="form-control" id="editCodigo" name="codigo" disabled>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button id="btCancelEdit" type="button" class="btn btn-secondary">Voltar</button>
            <button id="btSalvar" type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>

        <!-- Modo de Visualizacao -->
        <form id="viewForm" method="POST" action="/cadastroDelete/{id}" style="display: block;">
          @csrf
          @method('DELETE')
          <div class="mb-3">
            <label for="viewName" class="form-label">Nome</label>
            <input type="text" class="form-control" id="viewName" name="name" disabled>
          </div>
          <div class="mb-3">
            <label for="viewCodigo" class="form-label">Anilha</label>
            <input type="text" class="form-control" id="viewCodigo" name="codigo" disabled>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button id="btViewDelete" type="submit" class="btn btn-danger">Excluir</button>
            <button id="btViewAccept" type="button" class="btn btn-success">Aceitar</button>
            <button id="btViewEdit" type="button" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="min-w-full bg-white table-auto w-full">
                <thead><tr></tr></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('js/reloadTables.js') }}"></script>

@endsection