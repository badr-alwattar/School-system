<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Chat App</title>
        <link rel="icon" href="https://www.google.com/url?sa=i&url=http%3A%2F%2Fwww.iconarchive.com%2Ftag%2Fchat&psig=AOvVaw2nMHcydRYNtvHVy9jbqaFv&ust=1588452292087000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCLixlYfEk-kCFQAAAAAdAAAAABAD">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
            @include('layouts.navbar')
        
            <div class="row justify-content-center mt-4" id="app">
                <ul class="list-group w-50">
                    <li class="list-group-item active">Chat Room</li>
                    <message-component
                        v-for="value,index in chat.message" 
                        :key="value.index"
                        :color= chat.color[index]
                        :user= chat.user[index]
                    >
                    @{{value}}
                    </message-component>
                    <input type="text" v-model="message" @keyup.enter="send" class="form-control" placeholder="type your message here...">
                </ul>
            </div>
        



    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
