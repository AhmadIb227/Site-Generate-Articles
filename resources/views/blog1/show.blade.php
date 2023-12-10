@extends('layout1.appar')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                {{ $post->title }}
            </div>
            <div class="card-body">
                {{ $post->body }}
            </div>
        </div>
    </div>
@endsection 