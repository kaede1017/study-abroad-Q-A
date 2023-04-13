<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
    
{
    public function create(Answer $answer, Question $question)
    {
        return view('answers/create')->with(['question' => $question]);
    }
    
    public function store(Request $request, Answer $answer, Question $question)
    {
        $input = $request['answer'];
        $answer->user_id = Auth::id();
        $answer->question_id = $question->id;
        $answer->fill($input)->save();
        return redirect('/answers/' . $answer->id);
    }
    //
    public function edit(Answer $answer)
    {
        return view('answers/edit')->with(['answer' => $answer]);
    }
    public function update(AnswerRequest $request, Answer $answer)
    {
        $input_answer = $request['answer'];
        $answer->fill($input_answer)->save();
    
        return redirect('/answers/' . $answer->id);
    }
    public function delete(Answer $answer)
    {
        $answer->delete();
        return redirect('/');
    }
}
