@extends('home')

@section('conteudo')

<!-- Modal -->
<div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="viewFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewFormModalLabel">Informações do Dispositivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="viewForm" method="POST" action="" style="display: block;">
                <div class="mb-3">
                    <label for="mac" class="form-label">MAC</label>
                    <input type="text" class="form-control" id="mac" name="mac" disabled>
                </div>
                <div class="mb-3">
                    <label for="fabric" class="form-label">Fabricante</label>
                    <input type="text" class="form-control" id="fabric" name="fabric" disabled>
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
        <thead>
          <tr class="text-center">
            <th class="py-2 px-4 border-b relative" style="cursor: pointer">Data/Hora ▼</th>
            <th class="py-2 px-4 border-b relative" style="cursor: pointer">Localização ▼</th>
            <th class="py-2 px-4 border-b relative" style="cursor: pointer">Permitido ▼</th>
            <th class="py-2 px-4 border-b relative" style="cursor: pointer">Qual ESP Pegou ▼</th>
          </tr>
        </thead>
        <tbody id="tableData"></tbody>
      </table>
    </div>
  </div>
</div>

<script src="{{ asset('js/reloadTable/macaddress.js') }}"></script>

@endsection