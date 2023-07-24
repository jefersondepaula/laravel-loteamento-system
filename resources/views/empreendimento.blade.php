<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            <i class="fas fa-chart-line"></i> {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

    <div class="body-dash flex">
        <div class="left-side">
            <div class="dash-nav shadow bg-slate-500 inline-block w-52 h-full">
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
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
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
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-slate-500 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-white dark:text-gray-100">
                            <h3>Empreendimento - <span class="font-bold bg-blend-color">{{$name}}</span></h3>
                            <h2 class="font-bold">{{count($quadras)}} Quadras</h2>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($quadras as $index => $quadra)
                <div class="mt-2 mb-3" data-id="{{$quadra->id}}">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="py-2 px-6 text-gray-900 dark:text-gray-100 flex justify-between">
                                <h4>Quadra - {{$index+1}}</h4>
                                <a href="/dashboard/cadastrar/lote/quadra/{{$quadra->id}}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                                    <i class="fas fa-arrow-right"></i> Cadastrar Lote
                                </a>
                            </div>
                            <div class="flex py-2 px-6">
                                @if (!empty($quadra->lotes))
                                    @foreach ($quadra->lotes as $index => $lote)
                                       @if ($quadra->id == $lote->quadra_id)
                                            <div class="flex justify-center items-center border shadow mr-2 lote {{$lote->status}}" data-id="{{$lote->id}}" onclick="openModal(event, {{$lote->id}}, {{$quadra->id}}, '{{$lote->status}}', '{{$lote->vendedor}}', '{{$lote->comprador}}', '{{ \Carbon\Carbon::parse($lote->status_date)->format('d/m/Y')}}')">
                                                {{$index+1}}
                                            </div>

                                            @if ($lote->status == 'disponivel')
                                                {{-- modal para lote disponivel --}}
                                                <div id="modal-disponivel"  style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; display: none; align-items: center; justify-content: center;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                    <div style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; background: rgba(0,0,0,0.5);"></div>
                                                    <div class="border shadow-md rounded-md bg-white p-6 flex flex-col justify-center items-center" style="width:350px; margin: 0 auto; z-index: 999;">
                                                        <div>
                                                            <h3 class="text-lg leading-6 font-bold text-black mb-4 modal-title"></h3><hr>
                                                            {{-- <div class="lote-info" class="mt-2"></div>
                                                            <div class="quadra-info" class="mt-2"></div> --}}
                                                        </div>
                                                        <form id="cadastrar-cliente" class="w-full max-w-sm" action="/dashboard/empreendimentos/cadastrar" method="post">
                                                            @csrf
                                                            <div class="md:flex md:items-center my-4">
                                                            <div class="md:w-1/3">
                                                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                                                Nome do cliente
                                                                </label>
                                                            </div>
                                                            <div class="md:w-2/3">
                                                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="nome_cliente" type="text" name="nome_cliente" required>
                                                            </div>
                                                            </div>
                                                            <div class="md:flex md:items-center mb-4">
                                                                <div class="md:w-1/3">
                                                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="status">
                                                                        Status
                                                                    </label>
                                                                </div>
                                                                <div class="md:w-2/3">
                                                                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="status" name="status">
                                                                        <option value="reserva-solicitada">Reserva Solicitada</option>
                                                                        <option value="lote-reservado">Lote Reservado</option>
                                                                        <option value="vendido">Lote Vendido</option>
                                                                        <option value="indisponivel">Lote Indisponível</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" id="lote-id" name="lote_id" value="{{$lote->id}}">
                                                            <input type="hidden" id="quadra-id" name="quadra_id" value="{{$quadra->id}}">
                                                            <input type="hidden" id="user" name="user" value="{{auth()->user()->email}}">
                                                            <input type="hidden" id="empreendimento-id" name="user" value="{{$empreendimento_id}}">
                                                            <div class="md:flex md:items-center">
                                                            <div class="md:w-1/3"></div>
                                                            <div class="md:w-2/3 mt-4">
                                                                <button class="shadow bg-slate-900 hover:bg-slate-700 text-white focus:shadow-outline focus:outline-none text-gray-800 font-bold py-2 px-4 rounded" type="submit">
                                                                Enviar
                                                                </button>
                                                                <button class="modal-close shadow bg-slate-500 hover:bg-slate-400 text-white focus:shadow-outline focus:outline-none text-gray-800 font-bold py-2 px-4 rounded" type="button">
                                                                    Fechar
                                                                </button>

                                                            </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                {{-- modal para lote nao disponivel --}}
                                                <div id="modal-indisponivel"  style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; display: none; align-items: center; justify-content: center;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                    <div style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; background: rgba(0,0,0,0.5);"></div>
                                                    <div class="border shadow-md rounded-md bg-white p-6 flex flex-col justify-center items-center" style="width:350px; margin: 0 auto; z-index: 999;">
                                                        <div>
                                                            <h3 class="text-lg leading-6 font-bold text-black mb-4 modal-title-indisponivel"></h3><hr>
                                                            {{-- <div class="lote-info-indisponivel" class="mt-2"></div> --}}
                                                            <div class="lote-info-vendedor mt-2 text-slate-500 font-bold"></div>
                                                            <div class="lote-info-comprador my-2 text-slate-500 font-bold"></div>
                                                            <div class="lote-info-date text-slate-500 font-bold" ></div>
                                                        </div>
                                                        <div class="px-4 py-3 sm:flex sm:flex-row-reverse">
                                                            <button class="modal-close-indisponivel rounded bg-slate-900 px-4 py-2 hover:bg-slate-500 text-white" type="button">
                                                                Fechar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
