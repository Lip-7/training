@extends('layouts.app')
@section('content')
<h1 class="text-center">I tuoi appartamenti</h1>
<a href="{{route("apartments.create")}}" class="btn btn-primary mb-4 mx-auto">Aggiungi Casa</a>
<div class="container d-flex flex-wrap gap-3">
    @foreach ($apartments as $apartment)
    <div class="card" style="width: 18rem;">
        <img src="{{$apartment->photo}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$apartment->name}}</h5>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
          <div class="buttons d-flex gap-1">
            <a href="{{route("apartments.show", $apartment)}}" class="btn btn-primary">Dettagli</a>
            <a href="{{route("apartments.edit", $apartment)}}" class="btn btn-success">Modifica</a>
            <form action="{{route('apartments.destroy', $apartment)}}" method="POST">
                @csrf
                  @method('DELETE')
                    <button class="btn btn-danger" type="submit">Rimuovi</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
</div>
<a href="{{route("apartments.create", $apartment)}}" class="btn btn-primary text-center mt-4 mx-auto">Aggiungi Casa</a>
@endsection