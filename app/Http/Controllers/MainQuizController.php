<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainQuizController extends Controller
{
    public function quiz1() {
        return view('MainQuiz.quiz1');
    }

    public function quiz2() {
        return view('MainQuiz.quiz2');
    }

    public function quiz3() {
        return view('MainQuiz.quiz3');
    }

    public function quiz4() {
        return view('MainQuiz.quiz4');
    }

    public function quiz5() {
        return view('MainQuiz.quiz5');
    }

    public function quiz6() {
        return view('MainQuiz.quiz6');
    }

    public function quiz7() {
        return view('MainQuiz.quiz7');
    }

    public function quiz8() {
        return view('MainQuiz.quiz8');
    }

    public function quiz9() {
        return view('MainQuiz.quiz9');
    }

    public function quiz10() {
        return view('MainQuiz.quiz10');
    }

    public function resultQ() {
        return view('MainQuiz.resultQ');
    }

}
