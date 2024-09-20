@extends('home')

@section('conteudo')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="min-w-full bg-white table-auto w-full">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Data/Hora</th>
                        <th class="py-2 px-4 border-b">Endereço MAC</th>
                        <th class="py-2 px-4 border-b">Localização</th>
                        <th class="py-2 px-4 border-b">Permitido</th>
                        <th class="py-2 px-4 border-b">Fabricante do MAC</th>
                        <th class="py-2 px-4 border-b">Qual ESP Pegou</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b">2024-09-17 10:30:00</td>
                        <td class="py-2 px-4 border-b">00:14:22:01:23:45</td>
                        <td class="py-2 px-4 border-b">Sala A</td>
                        <td class="py-2 px-4 border-b text-success">Sim</td>
                        <td class="py-2 px-4 border-b">Apple</td>
                        <td class="py-2 px-4 border-b">ESP-001</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">2024-09-17 11:00:00</td>
                        <td class="py-2 px-4 border-b">00:14:22:01:23:46</td>
                        <td class="py-2 px-4 border-b">Sala B</td>
                        <td class="py-2 px-4 border-b text-danger">Não</td>
                        <td class="py-2 px-4 border-b">Samsung</td>
                        <td class="py-2 px-4 border-b">ESP-002</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">2024-09-17 12:15:00</td>
                        <td class="py-2 px-4 border-b">00:14:22:01:23:47</td>
                        <td class="py-2 px-4 border-b">Sala C</td>
                        <td class="py-2 px-4 border-b text-success">Sim</td>
                        <td class="py-2 px-4 border-b">Dell</td>
                        <td class="py-2 px-4 border-b">ESP-003</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">2024-09-17 13:45:00</td>
                        <td class="py-2 px-4 border-b">00:14:22:01:23:48</td>
                        <td class="py-2 px-4 border-b">Sala D</td>
                        <td class="py-2 px-4 border-b text-success">Sim</td>
                        <td class="py-2 px-4 border-b">HP</td>
                        <td class="py-2 px-4 border-b">ESP-004</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">2024-09-17 14:30:00</td>
                        <td class="py-2 px-4 border-b">00:14:22:01:23:49</td>
                        <td class="py-2 px-4 border-b">Sala E</td>
                        <td class="py-2 px-4 border-b text-danger">Não</td>
                        <td class="py-2 px-4 border-b">Lenovo</td>
                        <td class="py-2 px-4 border-b">ESP-005</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection