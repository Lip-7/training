@extends('layouts.app')
@section('content')
<div class="spons-cont">
    {{-- <h1>uuuuuuuuuuuuuuuuuuuuuuuuh</h1> --}}
    <div class="container py-5 text-center">
        <div>
            <h1>Le tue sponsorizzazioni</h1>
            <div class="container py-5 d-flex gap-3 justify-content-center flex-wrap">
                @foreach ($sponsorships as $sponsorship)
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$sponsorship->name}}</h5>
                      <p class="card-text">{{$sponsorship->duration}}</p>
                      <a href="{{route("sponsorships.show", $sponsorship, ["slug" => $sponsorship->name])}}" class="btn btn-primary">Acquista</a>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection