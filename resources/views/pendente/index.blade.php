@extends('home')

@section('conteudo')

<!-- Tela de Carregamento -->
<div id="loadingScreen" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(255, 255, 255, 0.8); z-index:10000; display:flex; align-items:center; justify-content:center;">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Carregando...</span>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewFormModalLabel">Informações da Anilha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modo de Visualizacao -->
        <form id="viewForm" method="POST" action="/cadastroDelete/{id}" style="display: block;">
          @csrf
          @method('DELETE')
          <div class="mb-3">
            <label for="viewName" class="form-label">Nome</label>
            <input type="text" class="form-control" id="viewName" name="name" enabled>
          </div>
          <div class="mb-3">
            <label for="viewCodigo" class="form-label">Anilha</label>
            <input type="text" class="form-control" id="viewCodigo" name="codigo" disabled>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button id="btViewDelete" type="submit" class="btn btn-danger">Excluir</button>
            <button id="btViewAccept" type="button" class="btn btn-success">Aceitar</button>
          </div>
        </form>
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

<script src="{{ asset('js/reloadTable/pendente.js') }}"></script>

@endsection