<div class="form-group">
    <label for="title">Titre</label>
    <input type="text" id="title" name="title" placeholder="Entrez le titre de votre article" value="{{ old('title',  isset($article->title) ? $article->title : null) }}">
    @error('title')
    <div>{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="article">Article</label>
    <textarea id="article" name="body" placeholder="Entrez le contenu de votre article ici">{{ old('body',  isset($article->body) ? $article->body : null) }}</textarea>
    @error('body')
    <div>{{ $message }}</div>
    @enderror
</div>
<div>
    <label for="image">Image</label>
    <input type="file" id="image" name="image">
    @error('image')
    <div>{{ $message }}</div>
    @enderror
</div>