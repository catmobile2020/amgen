<?php

namespace App\Http\Controllers\Api;

use App\Answer;
use App\Events\AnswerEvent;
use App\Events\QuestionEvent;
use App\Events\StartEvent;
use App\Http\Requests\AnswerRequest;
use App\Question;
use App\Set;
use App\SurveyAnswers;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StartController extends Controller
{
    public function start()
    {
        try
        {
            $random_set = Set::query()->where('is_used',false)->get();
            if(count($random_set))
            {
                $random_set =$random_set->random();
                event(new StartEvent($random_set));
                return response()->json(['state'=>2,'message'=>'Start Successfully'],200);
            }else
            {
                return response()->json(['state'=>1,'message'=>'All Sets Finished Successfully'],200);
            }
            
        }catch (\Exception $exception)
        {
            return response()->json(['state'=>0,'message'=>'Not Found Sets. Please Add First'],200);
        }
    }


    /**
     *
     * @SWG\Get(
     *      tags={"team"},
     *      path="/team/{name}",
     *      summary="get team",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="name",
     *         in="path",
     *         required=true,
     *         type="string",
     *         format="string",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param Request $request
     * @return Team|\Illuminate\Database\Eloquent\Model|null
     */
    public function team(Request $request)
    {
        $team = Team::with('sets.questions')->where('name',$request->name)->first();
        return $team;
    }

    /**
     *
     * @SWG\Get(
     *      tags={"sets"},
     *      path="/sets/{set}",
     *      summary="get set",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="set",
     *         in="path",
     *         required=true,
     *         type="integer",
     *         format="integer",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param Set $set
     * @return Set
     */
    public function sets(Set $set)
    {
        return $set;
    }

    /**
     *
     * @SWG\Get(
     *      tags={"questions"},
     *      path="/questions/{question}",
     *      summary="get question",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="question",
     *         in="path",
     *         required=true,
     *         type="integer",
     *         format="integer",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param Question $question
     * @return Question
     */
    public function questions(Question $question)
    {
        event(new QuestionEvent($question));
        event(new AnswerEvent($question->set->team));
        return $question;
    }

    /**
     *
     * @SWG\Post(
     *      tags={"answers"},
     *      path="/answers",
     *      summary="Send Answer",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="answer_id",
     *         in="formData",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Parameter(
     *         name="question_id",
     *         in="formData",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Parameter(
     *         name="set_id",
     *         in="formData",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Parameter(
     *         name="team_id",
     *         in="formData",
     *         required=true,
     *         type="integer",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param Request $request
     * @return Team|\Illuminate\Database\Eloquent\Model|null
     */
    public function answers(AnswerRequest $request)
    {
        $haveAnswer = SurveyAnswers::where('question_id',$request->question_id)
            ->where('set_id',$request->set_id)
            ->where('team_id',$request->team_id)->first();
        if ($haveAnswer)
        {
            return response()->json(['message'=>'You have answered this question before'],200);
        }
        $set = Set::find($request->set_id);

        if ($set->is_used)
        {
            return response()->json(['message'=>'You have answered this set of questions before'],200);
        }
        $result = SurveyAnswers::create($request->all());
        if ($result)
        {
            $answer = Answer::find($request->answer_id);
            $team = Team::find($request->team_id);
            $message = '';
            if ($answer->is_right)
            {
                $question_score = $answer->question->score;
                $team->update(['score'=>($team->score + $question_score)]);
                $message ='Right Answer';
            }else
            {
                $message = 'Wrong Answer';
            }
            $check_set = $set->questions()->latest()->first();
            if ($check_set->id == $request->question_id)
                {
                    $set->update(['is_used'=>true]);
                }
            event(new AnswerEvent($team));
            return response()->json(['message'=>$message],200);
        }
        return response()->json(['message'=>'You Have Error Try Again!'],400);
    }
    
    
     public function resetData()
     {
         Team::query()->update(['score'=>0]);
         Set::query()->update(['is_used'=>0]);
         SurveyAnswers::query()->truncate();
         return back();
     }


}
