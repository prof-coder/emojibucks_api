<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Played;
use App\Models\Quiz;
use App\Models\Question;

use App\Repositories\QuizRepository;
use App\Repositories\PlayedRepository;
use App\Repositories\QuestionRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;


/**
 * Class quizAPIController
 * @package App\Http\Controllers\API
 */

class quizAPIController extends AppBaseController
{
    /** @var  quizRepository */
    private $quizRepository;
    /** @var  quizRepository */
    private $playedRepository;
    /** @var  quizRepository */
    private $questionRepository;

    public function __construct(QuizRepository $quizRepo, PlayedRepository $playedRepo, QuestionRepository $questionRepo)
    {
        $this->quizRepository = $quizRepo;
        $this->playedRepository = $playedRepo;
        $this->questionRepository = $questionRepo;
    }

    /**
     * getQuizList.
     * POST /get_quiz_list
     *
     * @param Request $request
     * @return Response
     */

    public function getQuizList (Request $request)
    {
        // if ($validator->fails()) {
        //     return Response::json([
        //         'success' => false,
        //         'message' => 'Validation Error',
        //         'validation'=>$validator->errors()->toArray()
        //     ]);
        // }

        /* Set: Default Response */
            $response = [
                'success' => false,
                'message' => 'Not Found any Quizzes!'
            ];

        /* Get: Parameter */
            $input = $request->only([
                
            ]);

        /* Get: Data */
            if (!empty($input)) {
                /* Condition */
                $quizzes = $this->quizRepository->all();
            } else {
                /* All */
                $timestamp = now();
                $quizzes = Quiz::where('close_time', '>', DB::raw('CURRENT_TIMESTAMP'))
                    ->where('open_time', '<', DB::raw('CURRENT_TIMESTAMP'))
                    ->orderBy('close_time','ASC')
                    ->get();
            }

        /* Check Data */
            if (!empty($quizzes) && (count($quizzes) > 0)) {
                $response = [
                    'success' => true,
                    'quizzes' => $this->setArrayDataQuizzes($quizzes),
                    'message' => 'Successfully got!'
                ];
            }

        return Response::json($response);
    }

    /**
     * getQuestions.
     * POST /get_questions
     *
     * @param Request $request
     * @return Response
     */

    public function getQuestions (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation Error',
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        /* Set: Default Response */
            $response = [
                'success' => false,
                'message' => 'Not Found any Questions!'
            ];

        /* Get: Parameter */
            $input = $request->only([
                'quiz_id'
            ]);

        /* Get: Data */
            if (!empty($input)) {
                /* Condition */
                $questions = Question::where('quiz_id', $input['quiz_id'])
                    ->where('status', true)
                    ->inRandomOrder()
                    ->get();
            }

        /* Check Data */
            if (!empty($questions) && (count($questions) > 0)) {
                $response = [
                    'success' => true,
                    'questions' => $this->setArrayDataQuestions($questions),
                    'message' => 'Successfully got!'
                ];
            }

        return Response::json($response);
    }

    /**
     * getHistoryList.
     * POST /get_history_list
     *
     * @param Request $request
     * @return Response
     */

    public function getHistoryList (Request $request)
    {
        // if ($validator->fails()) {
        //     return Response::json([
        //         'success' => false,
        //         'message' => 'Validation Error',
        //         'validation'=>$validator->errors()->toArray()
        //     ]);
        // }

        /* Set: Default Response */
            $response = [
                'success' => false,
                'message' => 'Not Found any Histories!'
            ];

        /* Get: Parameter */
            $input = $request->only([
                'quizName',
                'completedTime'
            ]);

        /* Get: User Id */
            $user = $this->checkToken($request['token']);
            $user_id = $user->id;

        /* Get: Data */
            if (!empty($input)) {
                /* Condition */
                $histories = Played::where('user_id', $user_id)->with('user')->with('quiz')->get();
            } else {
                /* All */
                $histories = Played::where('user_id', $user_id)->with('user')->with('quiz')->get();
            }

        /* Check Data */
            if (!empty($histories) && (count($histories) > 0)) {
                $response = [
                    'success' => true,
                    'histories' => $this->setArrayDataHistories($histories),
                    'message' => 'Successfully got!'
                ];
            }

        return Response::json($response);
    }

    /**
     * getHistoryDetail.
     * POST /get_history_detail
     *
     * @param Request $request
     * @return Response
     */

    public function getHistoryDetail (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'history_id' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation Error',
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        /* Set: Default Response */
            $response = [
                'success' => false,
                'message' => 'Not Found detail of History!'
            ];

        /* Get: Parameter */
            $input = $request->only([
                'history_id'
            ]);

        /* Get: User Id */
            $user = $this->checkToken($request['token']);
            $user_id = $user->id;

        /* Get: Data */
            if (!empty($input)) {
                /* Condition */
                $history = Played::where('user_id', $user_id)
                    ->where('id', $input['history_id'])
                    ->with('user')
                    ->with('quiz')
                    ->get()
                    ->first();
            }

        /* Check Data */
            if (!empty($history)) {
                $response = [
                    'success' => true,
                    'history' => $this->setDataHistory($history),
                    'message' => 'Successfully got!'
                ];
            }

        return Response::json($response);
    }

    /**
     * setResult.
     * POST /set_result
     *
     * @param Request $request
     * @return Response
     */

    public function setResult (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'quiz_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'score' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation Error',
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        /* Set: Default Response */
            $response = [
                'success' => false,
                'message' => 'Not Found detail of History!'
            ];

        /* Get: Parameter */
            $input = $request->only([
                'quiz_id',
                'start_time',
                'end_time',
                'score'
            ]);

            /* Default values */
                $input['paid'] = 0;

        /* Get: User Id */
            $user = $this->checkToken($request['token']);
            $input['user_id'] = $user->id;

        /* Get: Data */
            if (!empty($input)) {
                /* Condition */
                $result = $this->playedRepository->create($input);
            }

        /* Check Data */
            if (!empty($result)) {
                $response = [
                    'success' => true,
                    'data' => $this->setDataHistory($result),
                    'message' => 'Successfully got!'
                ];
            }

        return Response::json($response);
    }

    /**
     * setQuestion.
     * POST /set_question
     *
     * @param Request $request
     * @return Response
     */

    public function setQuestion (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'num' => 'required',
            'question' => 'required',
            'search_terms' => 'required',
            'quiz_id' => 'required',
            'answer' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'message' => 'Validation Error',
                'validation'=>$validator->errors()->toArray()
            ]);
        }

        /* Set: Default Response */
            $response = [
                'success' => false,
                'message' => 'Not Found detail of History!'
            ];

        /* Get: Parameter */
            $input = $request->only([
                'num',
                'question',
                'search_terms',
                'quiz_id',
                'answer'
            ]);

        /* Get: Data */
            if (!empty($input)) {
                /* Condition */
                $result = $this->questionRepository->create($input);
            }

        /* Check Data */
            if (!empty($result)) {
                $response = [
                    'success' => true,
                    'data' => $this->setDataQuestion($result),
                    'message' => 'Successfully got!'
                ];
            }

        return Response::json($response);
    }
}
