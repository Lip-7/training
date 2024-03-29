@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="row g-3" action="{{ route('apartments.store') }}" method="POST" id="form">
            @csrf

            <div class="col-md-6">
                <label for="name" class="form-label">Titolo dell'annuncio</label>
                <input type="text" class="form-control @error('rooms') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                    <p id="error-name"></p>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="mq" class="form-label">Mq</label>
                <input type="text" class="form-control @error('mq') is-invalid
                @enderror"
                    id="mq" name="mq" value="{{ old('mq') }}">
                    <p id="error-mq"></p>
                @error('mq')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-9 position-relative">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control userAddressInput @error('address') is-invalid
                @enderror"
                    id="address" name="address" value="{{ old('address') }}">
                <input type="hidden" name="coordinates" id="coordinates" value="{{ old('coordinates') }}">
                <ul class="w-100 userAddressHints p-1"></ul>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="photo" class="form-label">Foto</label>
                <input type="text" class="form-control @error('photo') is-invalid
                @enderror"
                    id="photo" name="photo" value="{{ old('photo') }}">
                <p id="error-photo"></p>

                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="rooms" class="form-label">Camere</label>
                <input type="number" value="{{ old('rooms') }}" class="form-control @error('rooms') is-invalid @enderror"
                    id="rooms" name="rooms">
                <p id="error-rooms"></p>

                @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="bathrooms" class="form-label">Bagni</label>
                <input type="number" value="{{ old('bathrooms') }}"
                    class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms" name="bathrooms">
                <p id="error-bathrooms"></p>

                @error('bathrooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="beds" class="form-label">Letti</label>
                <input type="number" value="{{ old('beds') }}" class="form-control @error('beds') is-invalid @enderror"
                    id="beds" name="beds">
                <p id="error-beds"></p>

                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <h6 >Visibile</h6>
                <input type="radio" id="true" name="visible" value="1" {{old('visible') ? 'checked' : ''}}>
                <label for="true">si</label>
                <input type="radio" id="false" name="visible" value="0" {{old('visible') == true || (null == old('visible')) ? '' : 'checked'}}>
                <label for="false">no</label>
                <p id="error-radio"></p>

                @error('visible')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <h3>Servizi</h3>
            <p>Seleziona i servizi che puoi mettere a disposizione del cliente</p>
            <div class="col-12 services d-flex gap-3 flex-wrap btn-group">
                @foreach ($services as $service)
                    <div class="d-flex justify-content-center flex-column border border-2 p-2 rounded form-check">
                        <input type="checkbox"
                            class="@error('service->id') is-invalid
                        @enderror"
                            id="service-{{ $service->id }}" value="{{ $service->id }}" name="services[]"
                            @checked(in_array($service->id, old('services', [])))>
                        <label for="service-{{ $service->id }}">{{ $service->name }}</label>
                    </div>
                @endforeach
            <p id="error-check"></p>

                @error('service')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" id="button">Aggungi</button>
                <a class="btn btn-warning" href="{{ route('apartments.index') }}">Torna indietro</a>
            </div>
        </form>
    </div>
@endsection
