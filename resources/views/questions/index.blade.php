<x-app-layout>
    <body>
        <h1>Blog Name</h1>
        <div class='questions'>
            @foreach ($questions as $question)
                <div class='question'>
                    <h2 class='title'><a href="/questions/{{ $question->id }}">{{ $question->title }}</a></h2>
                    <p class='body'>{{ $question->body }}</p>
                    <form action="/questions/{{ $question->id }}" id="form_{{ $question->id }}" method="question">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteQuestion({{ $question->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <h2 class='paginate'>
            {{ $questions->links() }}
    
    <a href='/questions/create'>create</a>
        </h2>
        <script>
            function deleteQuestion(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>