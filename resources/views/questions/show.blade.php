<x-app-layout>
    <body>
        <h1 class="title">
            {{ $question->title }}
        </h1>
        <div class="content">
            <div class="content__question">
                <h3>本文</h3>
                <p>{{ $question->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>