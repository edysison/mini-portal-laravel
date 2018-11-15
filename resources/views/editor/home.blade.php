@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editor Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>
                                        <a href="{{route('editor.post.view', 'id='.$post->id)}}">
                                            View
                                        </a> - 
                                        <a href="{{route('editor.post.edit', 'id='.$post->id)}}">
                                            Edit
                                        </a> - 
                                        <a href="{{route('editor.post.delete', 'id='.$post->id)}}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('editor.post.edit')}}" class="btn btn-success">Add Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
