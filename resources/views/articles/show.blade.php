@extends('layouts.master')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
<div class="article-details">
    <h1>{{ $article->title }}</h1>
    <p class="article-content">{{ $article->body }}</p>
    <div class="article-meta">
        <p><strong>Publié par :</strong> {{ $article->user->name }}</p>
        <p><small>Publié le : {{ $article->created_at->format('d/m/Y') }}</small></p>
    </div>
</div>
<a href="/article/{{ $article->id }}/edit">Éditer l'article</a>
@endsection
