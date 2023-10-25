@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- <form action="{{ route('apartments.store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li class="ms-2">{{ $error }}</li>
                    @endforeach

                </ul>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('rooms') is-invalid @enderror"
                    id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rooms" class="form-label">Camere</label>
                <input type="number" value="{{ old('rooms') }}" class="form-control @error('rooms') is-invalid @enderror"
                    id="rooms" name="rooms">
                @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="beds" class="form-label">Letti</label>
                <input type="number" value="{{ old('beds') }}" class="form-control @error('beds') is-invalid @enderror"
                    id="beds" name="beds">
                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bathrooms" class="form-label">Bagni</label>
                <input type="number" value="{{ old('bathrooms') }}"
                    class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms" name="bathrooms">
                @error('bathrooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mq" class="form-label">Mq</label>
                <input type="text" class="form-control @error('mq') is-invalid            
                @enderror" id="mq" name="mq" value="{{ old('mq') }}">
                @error('mq')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control @error('address') is-invalid           
                @enderror" id="address" name="address" value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="text" class="form-control @error('photo') is-invalid           
                @enderror" id="photo" name="photo" value="{{ old('photo') }}">
                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lat" class="form-label">Latitudine</label>
                <input type="text" class="form-control @error('lat') is-invalid            
                @enderror" id="lat" name="lat" value="{{ old('lat') }}">
                @error('lat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lon" class="form-label">Longitudine</label>
                <input type="text" class="form-control @error('lon') is-invalid            
                @enderror" id="lon" name="lon" value="{{ old('lon') }}">
                @error('lon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 services d-flex gap-3 flex-wrap btn-group">
                @foreach ($services as $service)
                    <div class="d-flex justify-content-center flex-column border border-2 p-2 rounded form-check">
                        <input type="checkbox" class="@error('service->id') is-invalid           
                        @enderror" id="service-{{ $service->id }}" value="{{ $service->id }}"
                           name="services[]" @checked(in_array($service->id, old('service', [])))>
                        <label for="service-{{ $service->id }}">{{ $service->name }}</label>
                    </div>
                @endforeach
                @error('service')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <h3>Visibile</h3>
                @foreach ($visibleOptions as $item)
                <input type="radio" id="visible" name="visible">
                <label for="visible">{{ $item }}</label>
                @endforeach
                @error('visible')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Aggiungi</button>

            <a href="{{route('apartments.index')}}">Torna indietro</a>
        </form> --}}
        <form class="row g-3" action="{{ route('apartments.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li class="ms-2">{{ $error }}</li>
                    @endforeach

                </ul>
            @endif

            <div class="col-md-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('rooms') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
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
                @error('mq')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-9">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control @error('address') is-invalid           
                @enderror"
                    id="address" name="address" value="{{ old('address') }}">
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
                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 services d-flex gap-3 flex-wrap btn-group">
                @foreach ($services as $service)
                    <div class="d-flex justify-content-center flex-column border border-2 p-2 rounded form-check">
                        <input type="checkbox"
                            class="@error('service->id') is-invalid           
                        @enderror"
                            id="service-{{ $service->id }}" value="{{ $service->id }}" name="services[]"
                            @checked(in_array($service->id, old('service', [])))>
                        <label for="service-{{ $service->id }}">{{ $service->name }}</label>
                    </div>
                @endforeach
                @error('service')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <h3>Visibile</h3>
                <input type="radio" id="true" name="visible" value="1">
                <label for="true">si</label>
                <input type="radio" id="false" name="visible" value="0">
                <label for="false">no</label>
                @error('visible')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aggungi</button>
            </div>
            <a href="{{ route('apartments.index') }}">Torna indietro</a>
        </form>
    </div>
@endsection
