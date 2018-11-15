@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->cpf }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->access() }}</td>
                                    <td>
                                        <a href="{{route('admin.editor.view', 'id='.$user->id)}}">
                                            View
                                        </a> - 
                                        <a href="{{route('admin.editor.edit', 'id='.$user->id)}}">
                                            Edit
                                        </a> - 
                                        <a href="{{route('admin.editor.delete', 'id='.$user->id)}}">
                                            Delete
                                        </a>
                                    </td>
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
