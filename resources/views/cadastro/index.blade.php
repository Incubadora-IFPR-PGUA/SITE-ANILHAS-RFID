@extends('home')

@section('conteudo')

<!-- Modal -->  
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">INFORMAÇÕES ANILHA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <div class="mb-3">
            <label for="modalName" class="form-label">Nome</label>
            <input type="text" class="form-control" id="modalName">
          </div>
          <div class="mb-3">
            <label for="modalCodigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="modalCodigo" disabled>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="deleteButton" class="btn btn-danger">Excluir</button>
        <button type="button" id="saveButton" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>

<!-- Table -->
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

<script src="{{ asset('js/reloadTable/cadastro.js') }}"></script>

@endsection