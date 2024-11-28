
<li class="article-item">
    <h3>{{ $article->title }}</h3>
    <div class="article-meta">
        <p><strong>Publié par :</strong> {{ $article->user->name }}</p>
        <p><small>Publié le : {{ $article->created_at->format('d/m/Y') }}</small></p>
        <a href="/article/{{ $article->id }}">Article</a>
    </div>
</li>

