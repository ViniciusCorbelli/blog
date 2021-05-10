@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar categoria')
        @slot('url', route('admin.categories.store'))
        @slot('form')
            @include('admin.categories.form')
        @endslot
    @endcomponent
@endsection