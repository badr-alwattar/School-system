@extends('layouts.app')

@section('content')

<h1 class="text-center"> Account Settings </h1>
    <div class="container">
        <form  action="{{action('HomeController@updateAdmin')}}" method="post">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="id" type="hidden" value='{{Auth()->user()->id}}'/>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm text-right py-1"  > 
                        <input type="text" name="name" class="form-control" value='{{$user->name}}' placeholder="Name" required>
                    </div>
                    <div class="col-sm text-right py-1" > 
                        <input type="text" name="lname" class="form-control" value='{{$user->lastname}}' placeholder="Last Name" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm text-right py-1"  > 
                        <input type="text" name="address" class="form-control" value='{{$user->address}}' placeholder="Address" required>
                    </div>
                    <div class="col-sm text-right py-1" > 
                        <input type="tel" name="phone" class="form-control" value='{{$user->phone}}' placeholder="Phone Number" pattern="[0-9]*" required>
                    </div>
                </div>
            </div>
            @if(!Auth()->user()->isAdmin)
            <div class="form-group">
                <div class="row">
                    <div class="col-sm text-right py-1"  > 
                        <input type="text" name="iban" class="form-control" placeholder="IBAN" pattern="[A-Z]{2}[0-9]{15}"required>
                        <small class="font-weight-bold"> Country code + 15 digits - Example: SA000000000000000
                    </div>
                </div>
            </div>
            @endif

            
            <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>   
    </div>




@endsection