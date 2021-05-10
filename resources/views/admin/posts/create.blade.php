@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar Post')
        @slot('url', route('admin.posts.store'))
        @slot('form')
            @include('admin.posts.form')
        @endslot
    @endcomponent
@endsection