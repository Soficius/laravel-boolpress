<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Nuovo post pubblicato</h1>
    <h2>{{ $post->title }}</h2>
    <p>pubblicato il {{ $post->getFormattedDate('created_at') }}</p>
    <address>{{ $post->user->name }}</address>
    <p>Categoria:{{ $post->category->label }}</p>
    <p>Tags:
        @forelse ($post->tags as $tag)
            <div>{{ $tag->label }}</div>
        @empty
            Nessun tag
        @endforelse
    </p>
</body>

</html>
