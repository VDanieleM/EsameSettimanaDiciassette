<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Progetti Personali') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                    Aggiungi Progetto
                </button>
                
                 <!-- Add Project Modal -->
                 <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addProjectModalLabel">Aggiungi Progetto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="/progetti-personali" method="POST">
                          @csrf
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="nome" class="form-label">Nome</label>
                              <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="mb-3">
                              <label for="descrizione" class="form-label">Descrizione</label>
                              <textarea class="form-control" id="descrizione" name="descrizione"></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="immagine" class="form-label">Immagine</label>
                              <input type="text" class="form-control" id="immagine" name="immagine">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>

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
                    Dettagli e Modifica
                </button>
                                <!-- Delete button -->
                                <form action="{{ route('progetti-personali.destroy', $value->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addActivityModal{{$value->id}}">
                    Aggiungi Attività
                </button>
                 <!-- Delete Activity Dropdown -->
                 <form id="delAtt" action="/progetti-personali/{{$value->id}}/attivita/{{ old('attivita_id') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <select name="attivita_id" id="attivita_id" class="form-select" {{ $value->attivitas->isEmpty() ? 'disabled' : '' }}>
                        <option selected>Scegli un'attività...</option>
                        @foreach($value->attivitas as $attivita)
                            <option value="{{ $attivita->id }}">{{ $attivita->nome }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-danger" {{ $value->attivitas->isEmpty() ? 'disabled' : '' }}>Elimina</button>
                </form>
            </td>
        </tr>

        @endforeach
        @endif
    </tbody>
</table>
                </div>
            </div>
        </div>
    <!-- Add Activity Modal -->
    <div class="modal fade" id="addActivityModal{{$value->id}}" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addActivityModalLabel">Aggiungi Attività</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{ route('progetti-personali.attivita.store', $value->id) }}" method="POST">
                          @csrf
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="nome" class="form-label">Nome</label>
                              <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="mb-3">
                              <label for="descrizione" class="form-label">Descrizione</label>
                              <textarea class="form-control" id="descrizione" name="descrizione"></textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal Modifica -->
                <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifica Progetto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('progetti-personali.update', $value->id) }}" method="POST">
    @csrf
    @method('PUT')
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="nome" class="form-label">Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome" value="{{$value->nome}}">
                    </div>
                    <div class="mb-3">
                      <label for="descrizione" class="form-label">Descrizione</label>
                      <textarea class="form-control" id="descrizione" name="descrizione">{{$value->descrizione}}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="immagine" class="form-label">Immagine</label>
                      <input type="text" class="form-control" id="immagine" name="immagine" value="{{$value->immagine}}">
                    </div>
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
        </div>
        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    let select = document.getElementById('attivita_id');
    select.addEventListener('change', function() {
        let id = this.value;
        let form = document.querySelector('#delAtt');
        form.action = '/progetti-personali/{{$value->id}}/attivita/' + id;
    });
});
    </script>
</x-app-layout>