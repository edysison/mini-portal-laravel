@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View</div>

                <div class="card-body">
                    <h2>Editor {{$user->name}}</h2>
                    <h4>CPF {{$user->cpf}}</h4>
                    <h4>Email {{$user->email}}</h4>
                    <h4>Status {{$user->access()}}</h4>
                    <br>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->posts as $post)
                            <tr>
                                <th>{{$post->id}}</th>
                                <th>{{$post->title}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
