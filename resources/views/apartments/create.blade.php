@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('apartments.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="rooms" class="form-label">Camere</label>
            <input type="text" class="form-control" id="rooms" name="rooms">
        </div>
        <div class="mb-3">
            <label for="beds" class="form-label">Letti</label>
            <input type="text" class="form-control" id="beds" name="beds">
        </div>
        <div class="mb-3">
            <label for="bathrooms" class="form-label">Bagni</label>
            <input type="text" class="form-control" id="bathrooms" name="bathrooms">
        </div>
        <div class="mb-3">
            <label for="mq" class="form-label">Mq</label>
            <input type="text" class="form-control" id="mq" name="mq">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="text" class="form-control" id="photo" name="photo">
        </div>
        <div class="mb-3">
            <label for="lat" class="form-label">Foto</label>
            <input type="text" class="form-control" id="lat" name="lat">
        </div>
        <div class="mb-3">
            <label for="lon" class="form-label">Foto</label>
            <input type="text" class="form-control" id="lon" name="lon">
        </div>
        <div class="mb-3">
            <label for="visible" class="form-label">Visibile</label>
            <input type="text" class="form-control" id="visible" name="visible">
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
</div>
@endsection