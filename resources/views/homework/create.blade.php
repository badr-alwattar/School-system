@extends('layouts.app')

@section('content')

<h1 class="text-center"> Upload New Homework </h1>
    <div class="container">
        <form  action="{{action('HomeworkController@store')}}" method="post" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm text-right py-1"  >
                        <input type="text" name="title" class="form-control"  placeholder="Title" required>
                    </div>
                    <div class="col-sm text-right py-1"  > 
                        <input id="attachment" type="file" class="form-control" name="attachment">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm py-1"  > 
                    <label for="sel1">Homework for:</label>
                    <select name="assignedTo" class="form-control" id="sel1">
                    <option >Select user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id}}">{{ $user->name}}</option>
                        @endforeach
                    </select>
                       
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
            <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </form>   
    </div>




@endsection