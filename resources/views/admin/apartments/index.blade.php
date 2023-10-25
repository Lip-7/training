@extends('layouts.app')
@section('content')
  <div class="container">
    <h3 class="text-center mb-5">I Tuoi Appartamenti</h3>
    @if (count($apartments) > 0)
      <a href="{{ route("apartments.create") }}" class="btn btn-outline-dark mb-4 mx-auto">Aggiungi un nuovo appartamento</a>  
    @endif
    <div class="row">
      @forelse ($apartments as $apartment)
        <div class="col-12 my-3">
          <div class="card">
            <div class="row g-0" >
              <div class="col-md-4">
                <img src="{{ $apartment->photo }}" class="card-img width-100" alt="{{ $apartment->name }}" style="max-height: 300px;">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">{{ $apartment->name }}</h5>
                  <p class="card-text text-muted">{{ $apartment->address }}</p>
                </div>
              </div>
              <div class="col-2 d-flex flex-column py-4 justify-content-between px-3">
                <a href="{{ route("apartments.show", $apartment) }}" class="btn btn-success">
                  <i class="fas fa-eye me-2"></i>Dettagli
                </a>
                <a href="{{ route("apartments.edit", $apartment) }}" class="btn btn-warning">
                  <i class="fas fa-pencil-alt me-2"></i>Modifica
                </a>
                <button type="button" class="btn btn-danger" style="width: 100%;"data-bs-toggle="modal" data-bs-target="#modalId-{{ $apartment->id }}">
                  <i class="fas fa-trash-alt me-2"></i>Rimuovi
                </button>

                <!-- Modal Body -->
                <div class="modal fade text-black" id="modalId-{{ $apartment->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $apartment->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle-{{ $apartment->id }}"> Eliminare l'annuncio {{ $apartment->name }}? </h5>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Chiudi</button>
                          <form action="{{ route('apartments.destroy', $apartment->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                          </form>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col text-center py-3">
          <h4 class="text-muted py-3">Non hai ancora registrato alcun appartamento</h4>
          <a href="{{ route("apartments.create") }}" class="btn btn-outline-success mb-4 mx-auto">Aggiungi il tuo primo appartamento</a>
        </div>
      @endforelse
    </div>
  </div>
@endsection
