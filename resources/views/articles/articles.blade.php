@extends('layouts.master')


@section('title')
Articles
@endsection

@section('content')
<h2>Articles</h2>
@unless(! $articles)
    @foreach($articles as $article)
        @include('articles.index')
    @endforeach
@endunless
@each('articles.index',$articles,'article','articles.no-articles')
@endsection