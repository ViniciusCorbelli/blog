@extends('blog.layouts.app')

@section('content')
    <div class="container">
        <div class="verticals ten offset-by-one">
            <ol class="breadcrumb breadcrumb-fill2">
                <li><a href="{{ route('site.index') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ route('blog.date') }}">Datas</a></li>
                <li class="active-breadcrumb"> {{ $month }}</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="postagem categories">
                    <h1>Posts em <strong> {{ $month }} </strong> </h1>
                    @foreach ($posts as $post)
                        <hr>
                        @php
                            $lastComment = App\Comment::where('post_id', '=', $post->id)->get();
                            $countComments = count($lastComment);
                        @endphp
                        <div class="row">
                            <div class="col-2">
                                <a href="{{ route('blog.view', $post->id) }}">
                                    <img src="{{ asset('/storage/img/posts/' . $post->image) }}" class="elevation-2">
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('blog.view', $post->id) }}">
                                    <h6> <Strong> {{ $post->title }} </Strong> </h6>
                                    <p> Por {{ $post->user->name }}, {{ $post->date }}</p>
                                </a>
                                <p> <strong> <i class="fas fa-comments"></i> {{ $countComments }} respostas </strong>
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <h6>Última resposta</h6>
                                @if ($lastComment->first() != null)
                                    <h6>{{ $lastComment->first()->user->name }}, {{ $lastComment->first()->date }}
                                    </h6>
                                @else
                                    <h6>{{ $post->user->name }}, {{ $post->date }}</h6>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
