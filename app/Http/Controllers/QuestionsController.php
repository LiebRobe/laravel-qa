<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use DateTime;
use App\User;
class QuestionsController extends Controller
{
    function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
    {
        $datetime1 = date_create($date_1);

        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);

    }
    public function timeForAnEmail($dateTime1, $dateTime2){
        return $this->dateDifference($dateTime1,$dateTime2)>5?'true':'false';
    }
    public function index()
    {

        $questions=Question::with('user')->latest()->paginate(5);
//        //    $question = Question::find(1);
//
//          $now = new DateTime();
////        $lastUpdate =  $question->updated_at;
////        echo($this->timeForAnEmail($now->format('Y-m-d H:i:s'),$lastUpdate->format('Y-m-d H:i:s')));
////        echo('difference between the 2 Datetimes: ' . $this->dateDifference($now->format('Y-m-d H:i:s'),$lastUpdate->format('Y-m-d H:i:s')));
////        echo('<br/>' . $now->format('Y-m-d H:i:s'));
////        echo('<br/>' . $question->updated_at->format('Y-m-d H:i:s'));
//          $alle =[];
//        foreach($questions as $quest){
//            $lastUpdate = $quest->updated_at;
//            $difference = $this->dateDifference($now->format('Y-m-d H:i:s'),$lastUpdate->format('Y-m-d H:i:s'));
//            if($difference>1){
//                 $alle = ('Email senden an ' . User::find($quest->user_id)->email);
//            }
//        }
//        $question = $questions[0];
//        $time = date_create($question->created_at);
//        $min = date_format($now,'y');
//        $hour = date_format($now,'h');
//        //dd($min);
//        //dd($hour);
//       // dd($now);
//        dd($alle);
//        dd('Vorlaeuffiges Ende!');
        return view('questions.index', compact('questions')) ;


    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Question $question)
    {
        //
    }

    public function edit(Question $question)
    {
        //
    }

    public function update(Request $request, Question $question)
    {
        //
    }

    public function destroy(Question $question)
    {
        //
    }
}
