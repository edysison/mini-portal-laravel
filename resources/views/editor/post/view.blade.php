@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View</div>

                <div class="card-body">
                    <h2>Title {{$post->title}}</h2>
                    <h4>Description {{$post->description}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
