<x-app-layout>
    <body>
        <h1>質問回答</h1>
        <form action="/answers/{{$question->id}}" method="POST">
            @csrf
            <h2>Body</h2>
                <textarea name="answer[body]" placeholder="回答を入力してください"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>