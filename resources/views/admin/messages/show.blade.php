@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <span class="text-small">{{$message->email}}</span>
                </div>
                <div class="col">
                    <span class="text-small">{{$message->name}}</span>
                    <span class="text-small text-capitalize">{{$message->lastname}}</span>
                </div>
            </div>
        </div>
        <div class="col text-end bg-grey">
            <span class="text-small">{{$message->created_at}}</span>
        </div>
    </div>
    <div class="maintext bg-light m-3 rounded p-5">
        <p>{{$message->text}}</p>
    </div>
</div>
@endsection
