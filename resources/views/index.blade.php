<title>SMART ANILHAS</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        @if(request()->routeIs('cadastro.index'))
            Anilhas já cadastradas!
        @endif
        @if(request()->routeIs('pendente.index'))
            Anilhas em espera para serem aceitas!
        @endif
        @if(request()->routeIs('registro.index'))
            Registros de anilhas já cadastradas!
        @endif
    </x-slot>
    @yield('conteudo')
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>