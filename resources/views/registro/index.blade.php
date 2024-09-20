@extends('home')

@section('conteudo')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-center mb-4"><h2 class="display-6 font-weight-bold"></h2></div>
            <table class="min-w-full bg-white table-auto w-full">
                <thead><tr></tr></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('js/reloadTables.js') }}"></script>

@endsection