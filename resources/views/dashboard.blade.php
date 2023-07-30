<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            <i class="fas fa-chart-line"></i> {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

    <div class="body-dash flex">
        <div class="left-side">
            <div class="dash-nav shadow bg-slate-500 inline-block w-52 h-screen">
                <div class="menu-items">
                    <ul class="flex flex-col p-4">
                        <li class="mr-2 mb-2 text-white">
                            <a href="/dashboard/register"><i class="fas fa-user-plus"></i> Cadastrar Pessoa</a>
                        </li>
                        <li class="mr-2 mb-2 text-white">
                           <a href="/dashboard/empreendimentos"> <i class="fas fa-home"></i> Empreendimentos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-side w-full">
            <div class="py-6">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-slate-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-6 mt-4 mb-4 text-gray-900 dark:text-gray-100">
                            <h2><i class="fas fa-info-circle"></i> Legenda</h2>
                        </div>
                        <div class="flex flex-wrap w-full py-2 px-4">
                            <div class="flex-1 py-2 text-center border disponivel">
                                Lote disponível
                            </div>
                            <div class="flex-1 py-2 text-center border solicitada">
                                Reserva solicitada
                            </div>
                            <div class="flex-1 py-2 text-center border reservado">
                                Lote reservado
                            </div>
                            <div class="flex-1 py-2 text-center border vendido">
                                Lote vendido
                            </div>
                            <div class="flex-1 py-2 text-center border indisponivel">
                                Lote indisponível
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-1">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-slate-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-blue-950 dark:text-gray-100 ">
                            <h2><i class="fas fa-building"></i> Todos os empreendimentos</h2>
                            <div class="flex mr-2 mt-4">
                                @if (!empty($empreendimentos))
                                    @foreach ($empreendimentos as $empreendimento)
                                        <div class="mr-2 border border-l-8 border-l-emerald-700 border-gray-400 shadow p-4 rounded-lg bg-slate-200">
                                            <div class="empreendimento-box text-white">
                                                <h1 class="text-black">Nome do empreendimento: <span class="text-emerald-900 font-bold">{{$empreendimento->name}}</span></h1>
                                                <p class="text-black">Quantas quadras: <span class="text-emerald-900 font-bold">{{$empreendimento->quadras}} </span></p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
