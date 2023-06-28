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
            <div class="flex justify-between strong">
                <h1>Empreendimentos</h1>
                <h3><a href="/dashboard/empreendimentos/cadastrar" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    <i class="fas fa-arrow-right"></i> Cadastrar empreendimentos
                </a></h3>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mt-6">
                <h2><i class="fas fa-building"></i> Todos os empreendimentos</h2>
                <div class="flex mr-2 mt-6">
                    @if (!empty($empreendimentos))
                        @foreach ($empreendimentos as $empreendimento)
                            <a href="/dashboard/empreendimento/{{$empreendimento->id}}">
                                <div class="mr-2 border shadow p-2">
                                    <div class="empreendimento-box bg-gray">
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

</x-app-layout>




