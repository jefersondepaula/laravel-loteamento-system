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
                <h1 class="mb-4 text-sky-700 font-bold">Cadastrar Lote</h1>
                <div class="bg-slate-500 max-w-lg dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form class="w-full max-w-sm" action="/dashboard/cadastrar/lote" method="post">
                        @csrf
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-white font-bold md:text-right mb-1 md:mb-0 pr-4" for="status">
                                Status
                              </label>
                            </div>
                            <div class="md:w-2/3">
                              <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="status" name="status" onchange="showField(this.value)">
                                <option value="disponivel">Disponível</option>
                                <option value="reserva-solicitada">Reserva Solicitada</option>
                                <option value="lote-reservado">Lote Reservado</option>
                                <option value="vendido">Vendido</option>
                                <option value="indisponivel">Indisponível</option>
                              </select>
                            </div>
                        </div>
                        <div id="comprador-vendedor" class="hidden">
                            <div class="md:flex md:items-center mb-6">
                              <div class="md:w-1/3">
                                <label class="block text-white font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                                  Cliente
                                </label>
                              </div>
                              <div class="md:w-2/3">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="comprador" type="text" name="comprador">
                              </div>
                            </div>
                        </div>
                        <div class="md:flex md:items-center">
                          <div class="md:w-1/3"></div>
                          <div class="md:w-2/3">
                            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="quadra" type="hidden" name="quadra" value="{{$quadra}}">
                            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="quadra" type="hidden" name="empreendimento" value="{{$empreendimento_id}}">

                            <button class="shadow bg-slate-800 hover:bg-slate-600 text-white focus:shadow-outline focus:outline-none text-gray-800 font-bold py-2 px-4 rounded" type="submit">
                              Enviar
                            </button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
        </div>
</x-app-layout>
