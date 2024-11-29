<!DOCTYPE html>
<html lang="{{  str_replace('_', '-', app()->getLocale())  }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Titre principal de la page */
        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #333;
        }

        /* Liste des articles */
        ul.articles-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Article individuel */
        .article-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease-in-out;
        }

        /* Changement d'apparence au survol */
        .article-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Titre d'article */
        .article-item h3 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }

        /* Contenu de l'article */
        .article-item p {
            font-size: 1rem;
            line-height: 1.5;
            color: #666;
        }

        /* Auteur et date */
        .article-meta {
            font-size: 0.9rem;
            color: #999;
            margin-top: 10px;
        }

        /* Style pour un message si aucun article n'est trouvé */
        .no-articles {
            text-align: center;
            font-size: 1.5rem;
            color: #888;
        }

        /* Liens */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Container pour la page des détails d'un article */
        .article-details {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Titre de l'article */
        .article-details h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        /* Contenu de l'article */
        .article-content {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }

        /* Métadonnées (nom de l'auteur, date de publication) */
        .article-meta {
            font-size: 1rem;
            color: #777;
            border-top: 1px solid #f1f1f1;
            padding-top: 10px;
        }

        .article-meta p {
            margin: 5px 0;
        }

        /* Style pour l'auteur */
        .article-meta strong {
            font-weight: bold;
        }

        /* Style pour la date */
        .article-meta small {
            color: #aaa;
        }

        /* Ajout d'un peu de padding pour l'ensemble de la page */
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>

<body>
    <h1>Laravel 101</h1>
    <a href="/contact-us">Contactez-nous</a>
    <a href="/about-us">A propo</a>
    <a href="/articles">Articles</a>
    @can('create', 'App\Models\Article')
    <a href="/articles/create">Créer un article</a>
    @endcan
    <!-- @auth
    <a href="/articles/create">Ajoutez un article</a>
    @endauth -->
    @guest
    <a href="{{ route('register') }}">Créer un compte</a>
    <a href="{{ route('login') }}">Login</a>
    @endguest
    @auth
    <a href="{{ route('profile') }}">Votre profil</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="Se déconnecter">
    </form>
    @endauth
    @include('messages.allMessages')
    <div class="container">
        @yield('content')
    </div>
</body>

</html>