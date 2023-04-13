<x-app-layout>
    <body>
        <h1>留学Q&A</h1>
        <form action="/questions" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="question[title]" placeholder="タイトル" value="{{ old('question.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('question.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="question[body]" placeholder="質問を入力してください"></textarea>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="question[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>