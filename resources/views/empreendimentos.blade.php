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
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-between strong">
                        <h1 class="text-sky-700 font-bold">Empreendimentos</h1>
                        <h3 class="font-bold hover:animate-bounce hover:underline"><a href="/dashboard/empreendimentos/cadastrar" class="text-sky-700 dark:text-gray-400 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                            <i class="fas fa-arrow-right text-sky-700 font-bold"></i> Cadastrar empreendimentos
                        </a></h3>
                    </div>

                    <div class="bg-slate-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mt-6">
                        <h2><i class="fas fa-building"></i> Todos os empreendimentos</h2>
                        <div class="flex mr-2 mt-6">
                            @if (!empty($empreendimentos))
                                @foreach ($empreendimentos as $empreendimento)
                                    <a href="/dashboard/empreendimento/{{$empreendimento->id}}">
                                        <div class="mr-2 border shadow p-2  border-gray-400 shadow p-2 rounded-lg bg-slate-500">
                                            <div class="empreendimento-box bg-gray text-white">
                                                <h1 class="">Nome do empreendimento: <span class="font-medium">{{$empreendimento->name}}</span></h1>
                                                <p>Qtd de quadras: <span class="font-medium">{{$empreendimento->quadras}}</span></p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>




