@extends('layouts.app')
@section('content')
    <div class="lg-side">

        <div class="inbox-body">
            <div class="mail-option">
                <div class="chk-all">
                    <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                    <div class="btn-group">
                        <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                            All
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"> None</a></li>
                            <li><a href="#"> Read</a></li>
                            <li><a href="#"> Unread</a></li>
                        </ul>
                    </div>
                </div>

                <div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#"
                        class="btn mini tooltips">
                        <i class=" fa fa-refresh"></i>
                    </a>
                </div>
                <div class="btn-group hidden-phone">
                    <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                        More
                        <i class="fa fa-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                        <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <a data-toggle="dropdown" href="#" class="btn mini blue">
                        Move to
                        <i class="fa fa-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                        <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                    </ul>
                </div>

                <ul class="unstyled inbox-pagination">
                    <li><span>{{$allMessageOfApartment->currentPage()}} / {{$allMessageOfApartment->lastPage()}}</span></li>
                    <li>
                        <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                    </li>
                    <li>
                        <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                    </li>
                </ul>
            </div>
            <tbody>
                @if (count($allMessageOfApartment) > 0)
                {{-- {{dd($allMessageOfApartment)}} --}}
                <table class="table table-inbox table-hover">
                    @foreach ($allMessageOfApartment as $mess)
                    <tr class="read">
                        <td class="inbox-small-cells">
                            <input type="checkbox" class="mail-checkbox">
                        </td>
                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                        <td class="view-message  dont-show">{{$mess->email}}</td>
                        <td class="view-message ">{{$mess->text}}</td>
                        <td class="view-message  text-right">{{$mess->created_at}}</td>
                        <td class="view-message  text-right"><a href="{{route('messages.show',['apartment' => $apartment, 'message' => $mess])}}" class="btn btn-primary">Apri</a></td>
                    </tr>
                    @endforeach
                </tbody>
                    @else
                    <h3 class="text-center text-danger">Non hai ancora ricevuto messaggi</h3>
                    @endif
            </table>
        </div>
    </div>
@endsection
