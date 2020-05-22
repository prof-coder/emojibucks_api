<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use DateTime;

use App\Models\User;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function checkToken($token) {
        $users = User::where('token', $token)->get();
        if (!empty($users) && (count($users) > 0)) return $users[0];
        return false;
    }

    /* Quiz Data */
        public function setArrayDataQuizzes($quizzes) {
            $return_quizzes = [];
            /* Set Render Data */
                foreach ($quizzes as $key => $quiz) {
                    array_push($return_quizzes, $this->setDataQuiz($quiz));
                }
            return $return_quizzes;
        }

        public function setDataQuiz($quiz) {
            $quiz['opening'] = $quiz->open_time->format('Y-m-d H:i:s');
            $quiz['closing'] = $quiz->close_time->format('Y-m-d H:i:s');
            unset($quiz->open_time);
            unset($quiz->close_time);
            return $quiz;
        }

    /* History */
        public function setArrayDataHistories($histories) {
            $return_histories = [];
            /* Set Render Data */
                foreach ($histories as $key => $history) {
                    array_push($return_histories, $this->setDataHistory($history));
                }
            return $return_histories;
        }

        public function setDataHistory($history) {
            $history['user_email'] = $history->user->email;
            $history['quiz_name'] = $history->quiz->name;

            $history['time_start'] = $history->start_time->format('Y/m/d H:i:s');
            $history['time_end'] = $history->end_time->format('Y/m/d H:i:s');
            // $history['time_duration'] = $history->end_time->format('Y/m/d H:i:s');

            $start_date_time = new DateTime($history['time_start']);
            $end_date_time = new DateTime($history['time_end']);
            $duration = $end_date_time->diff($start_date_time);

            $history['time_duration'] = $duration->format('%H:%I:%S');

            unset($history->user);
            unset($history->quiz);

            unset($history->user_id);
            unset($history->quiz_id);

            unset($history->start_time);
            unset($history->end_time);

            return $history;
        }

    /* Questions */
        public function setArrayDataQuestions($questions) {
            $return_questions = [];
            /* Set Render Data */
                foreach ($questions as $key => $question) {
                    array_push($return_questions, $this->setDataQuestion($question));
                }
            return $return_questions;
        }

        public function setDataQuestion($question) {
            $question['quiz_name'] = $question->quiz->name;
            unset($question->quiz);
            unset($question->quiz_id);
            return $question;
        }
}
