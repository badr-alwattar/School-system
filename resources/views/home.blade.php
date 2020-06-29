@extends('layouts.app')

@section('content')
<div class="container-fluid mx-5">

<div class="row mx-5">
    <div class="col-sm-7">
    
            @if(Auth()->user()->isAdmin)
                <a class="btn btn-info btn-block my-4" href="homework/create" role="button">Upload Homework</a>
            @endif
                <!-- <a class="btn btn-danger btn-block my-4" href="storage/cAkDxuv6UWy20hegEuxThmKBqJ1fUvUGyy5t2GNK.pdf" role="button">Homework</a> -->
            @if(Auth()->user()->isAdmin)
                <h2> All Homeworks </h2>
            @else
                <h2> Your Homeworks </h2>
            @endif
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Homework</th>
                    <th scope="col">Preview</th>
                    @if(Auth()->user()->isAdmin)
                        <th scope="col">Assigned To</th>
                        <th scope="col">Solution</th>
                    @endif
                    @if(!Auth()->user()->isAdmin)
                        <th scope="col">Upload Solution</th>
                    @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($homeworks as $homework)
                        @if(!Auth()->user()->isAdmin)
                            @if($homework->assignedTo == Auth()->user()->id)
                                <tr>
                                    <td>{{$homework->title}}</td>
                                    <td><a class="btn btn-danger" href='/storage/{{$homework->attachment}}' role="button">Homework</a></td>
                                        @if(!$homework->solution_uploaded)
                                            <td><a class="btn btn-success" href='/homeworksol/{{$homework->id}}/edit' role="button">Upload</a></td>
                                        @endif
                                    
                                    
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td>{{$homework->title}}</td>
                                <td>{{$homework->assignedToName}}</td>
                                <td><a class="btn btn-danger" href='/storage/{{$homework->attachment}}' role="button">Homework</a></td>
                                @if($homework->solution_uploaded)
                                    <td><a class="btn btn-success" href='/storage/{{$homework->solution}}' role="button">Upload</a></td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
    </div>

    <div class="col-sm-3 py-4">
        <h4 class="text-center"> All Users </4>
        <users></users>
    </div>

</div>

</div>
@endsection
