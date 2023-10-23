@extends('layouts.app')
@section('content')
<div class="container text-center ">
    <div class="card border-radius p-2" >
        <div class="row">
            <div class="col-md-6">
                <img src="{{$apartment->photo}}" class="card-img" alt="{{$apartment->name}}" style="height: 35rem">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title py-3">{{$apartment->name}}</h3>
                    <p class="card-text"><i class="fa-solid fa-map-pin"></i> {{$apartment->address}}</p>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-home"></i> Mq: {{$apartment->mq}}</li>
                        <li><i class="fa-solid fa-bed"></i> Rooms: {{$apartment->rooms}}</li>
                        <li><i class="fa-solid fa-bath"></i> Bathrooms: {{$apartment->bathrooms}}</li>
                        <li>
                            <i class="fa-solid {{ $apartment->visible === 1 ? 'fa-check' : 'fa-xmark' }}"></i>
                            Available
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="buttons d-flex justify-content-center gap-5 mt-2">
        <a href="{{route("apartments.edit", $apartment)}}" class="btn btn-success">Modifica</a>
        <form action="{{route('apartments.destroy', $apartment)}}" method="POST">
            @csrf
              @method('DELETE')
                <button class="btn btn-danger" type="submit">Rimuovi</button>
        </form>
    </div>
</div>
@endsection
