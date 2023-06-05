<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />

    <meta
        name="description"
        content="{{ $post->user->user_description ? $post->user->user_description : '' }}"
    />

    <meta
        name="keywords"
        content="{{ $post->user->user_keywords ? $post->user->user_keywords : '' }}"
    />

    <meta
        name="author"
        content="{{ $post->user->name ? $post->user->name : '' }}"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        Laravel App
    </title>
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    />
</head>
<body>
    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{ URL::previous() }}"
                class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                < Back to previous page
            </a>
        </div>

        <h4 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 sm:py-20">
            {{ $post->title }}
        </h4>

        <p class="pt-4 italic">
            Communitys :
            @foreach ($user->communitys as $community)
                {{ $community->name }}
            @endforeach
        </p>

        <div class="pt-10 pb-10 text-gray-900 text-xl">
            <p class="text-base text-black pt-10">
                {{ $post->body }}
            </p>
        </div>
    </div>
    </body>
</html>