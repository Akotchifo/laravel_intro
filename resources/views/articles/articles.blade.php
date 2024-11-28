@extends('layouts.master')

@section('title')
Articles
@endsection

@section('content')
<div class="container">
    <h2>Articles</h2>
    
    @if($articles->isEmpty())
        <p class="no-articles">Aucun article trouvé.</p>
    @else
        <ul class="articles-list">
            @each('partials.article', $articles, 'article', 'partials.no-articles')
        </ul>
    @endif
</div>
@endsection
