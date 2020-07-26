@extends('layouts.layout')

@section('title', 'Register')

@section('layout_header')
    @include('layouts.headers.guest')
@endsection

@section('layout_content')
    <div class="ui grid">
        <div class="column">
            @include('layouts.auth.register_form')
        </div>
    </div>
@endsection
