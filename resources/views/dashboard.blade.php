<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-chart-line"></i> {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dash-nav shadow" style="left:0; background-color:#fff;">
        <div class="menu-items" style="padding:20px">
            <ul class="flex">
                <li class="mr-2">
                    <a href="/dashboard/register"><i class="fas fa-user-plus"></i> Cadastrar Pessoa |</a>
                </li class="mr-2">
                <li>
                   <a href="/dashboard/empreendimentos"> <i class="fas fa-home"></i> Empreendimentos |</a>
                </li>
            </ul>
            </ul>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 mt-4 mb-4 text-gray-900 dark:text-gray-100">
                    <h2><i class="fas fa-info-circle"></i> Legenda</h2>
                </div>
                <div class="flex flex-wrap w-full py-2 px-4">
                    <div class="flex-1 py-2 text-center text-gray-900 border disponivel">
                        Lote disponível
                    </div>
                    <div class="flex-1 py-2 text-center text-gray-900 border solicitada">
                        Reserva solicitada
                    </div>
                    <div class="flex-1 py-2 text-center text-gray-900 border reservado">
                        Lote reservado
                    </div>
                    <div class="flex-1 py-2 text-center text-gray-900 border vendido">
                        Lote vendido
                    </div>
                    <div class="flex-1 py-2 text-center text-gray-900 border indisponivel">
                        Lote indisponível
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2><i class="fas fa-building"></i> Todos os empreendimentos</h2>
                    <div class="flex mr-2 mt-4">
                        @if (!empty($empreendimentos))
                            @foreach ($empreendimentos as $empreendimento)
                                <div class="mr-2 border shadow p-2">
                                    <div class="empreendimento-box bg-gray">
                                        <h1>Nome do empreendimento: {{$empreendimento->name}}</h1>
                                        <p>Quantas quadras: {{$empreendimento->quadras}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
