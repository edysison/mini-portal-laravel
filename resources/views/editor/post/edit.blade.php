@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit</div>

                <div class="card-body">
                    @if(isset($post->title))
                    <form method="POST" action="{{ route('editor.post.update') }}">
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    @else
                    <form method="POST" action="{{ route('editor.post.add') }}">
                    @endif
                        
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                @if(isset($post->title))
                                <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required>
                                @else
                                <input id="title" type="text" class="form-control" name="title" required>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                @if(isset($post->description))
                                <textarea rows="4" cols="50" id="description" type="text-field" class="form-control" name="description" required>{{ $post->description }}</textarea>
                                @else
                                <textarea rows="4" cols="50" id="description" type="text-field" class="form-control" name="description" required></textarea>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
