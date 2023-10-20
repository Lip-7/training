@extends('layouts.app')
@section('content')
<h1 class="text-center">I tuoi appartamenti</h1>
<div class="container d-flex flex-wrap gap-3">
    @foreach ($apartments as $ap)
    <div class="card" style="width: 18rem;">
        <img src="{{$ap->photo}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$ap->name}}</h5>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
          <a href="#" class="btn btn-primary">Dettagli</a>
          <a href="#" class="btn btn-danger">Rimuovi</a>
        </div>
      </div>
    @endforeach
</div>
@endsection