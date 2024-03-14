<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tutti i Progetti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Immagine</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @if($progetti)
        @foreach($progetti as $key => $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->nome}}</td>
            <td><img src="{{$value->immagine}}" alt="" class="rounded" width="150"></td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">
                    Dettagli
                </button>
            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Dettagli Progetto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><strong>ID:</strong> {{$value->id}}</p>
                <img src="{{$value->immagine}}" alt="" class="rounded" width="150"></p>
                <p><strong>Nome:</strong> {{$value->nome}}</p>
                <p><strong>Descrizione:</strong> {{$value->descrizione}}</p>
                <p><strong>Gestito da:</strong> {{$value->user->name}}</p>
                <p><strong>Creazione:</strong> {{$value->created_at}}</p>
                <p><strong>Ultima Modifica:</strong> {{$value->updated_at}}</p>
                <div class="mb-3">
            <label for="attivitas" class="form-label fw-bold">Attività:</label>
            <ul id="attivitas">
              @foreach($value->attivitas as $attivita)
              <li class="fw-bold">{{ $attivita->nome }}</li>
                <li>{{ $attivita->descrizione }}</li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="modal-footer">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
