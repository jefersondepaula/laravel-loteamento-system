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
            <h1>Cadastrar Empreendimentos</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form class="w-full max-w-sm" action="/dashboard/empreendimentos/cadastrar" method="post">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                          Nome
                        </label>
                      </div>
                      <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" name="name">
                      </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                      <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                          Quadras
                        </label>
                      </div>
                      <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="number" name="number">
                      </div>
                    </div>
                    <div class="md:flex md:items-center">
                      <div class="md:w-1/3"></div>
                      <div class="md:w-2/3">
                        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-gray-800 font-bold py-2 px-4 rounded" type="submit">
                          Enviar
                        </button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>

</x-app-layout>
