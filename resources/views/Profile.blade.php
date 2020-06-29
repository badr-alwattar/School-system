@extends('layouts.app')

@section('content')


    <div class="container">
        <h1 class="py-3"> {{$user->name}}'s Profile: </h1>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name: <span class="font-weight-bold">{{$user->name}}</span></h5>
                    <h6 class="card-subtitle">LastName: <span class="font-weight-bold">{{$user->lastname}}</span></h6>
                    <ul>

                    <li>Address: <span class="font-weight-bold">{{$user->address}}</span></li>
                    <li>Phone Number: <span class="font-weight-bold">{{$user->phone}}</span></li>
                    @if(!Auth()->user()->isAdmin)
                        <li>IBAN: <span class="font-weight-bold">{{$user->iban}}</span></li>
                    @endif
                    </ul>
                </div>
            </div>
    </div>


@endsection