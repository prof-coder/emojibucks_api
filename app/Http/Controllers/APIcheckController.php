<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class APIcheckController extends AppBaseController
{

    /**
     * Testing - Login User
     *
     * @param Request $request
     *
     * @return Response
     */
    public function auth_login(Request $request)
    {
        return view('api_check.auth.check_login');
    }

    /**
     * Testing - Register User
     *
     * @param Request $request
     *
     * @return Response
     */
    public function auth_register(Request $request)
    {
        return view('api_check.auth.check_register');
    }

    /**
     * Testing - Update User Email
     *
     * @param Request $request
     *
     * @return Response
     */
    public function update_email(Request $request)
    {
        return view('api_check.auth.update_email');
    }

    /**
     * Testing - Update User Email
     *
     * @param Request $request
     *
     * @return Response
     */
    public function set_contact_info(Request $request)
    {
        return view('api_check.auth.set_contact_info');
    }

    /**
     * Testing - Get Quiz List
     *
     * @param Request $request
     *
     * @return Response
     */
    public function get_quiz_list(Request $request)
    {
        return view('api_check.quiz.get_quiz_list');
    }

    /**
     * Testing - Get Questions
     *
     * @param Request $request
     *
     * @return Response
     */
    public function get_quiz_questions(Request $request)
    {
        return view('api_check.quiz.get_quiz_questions');
    }
    
    /**
     * Testing - Get History List
     *
     * @param Request $request
     *
     * @return Response
     */
    public function get_history_list(Request $request)
    {
        return view('api_check.quiz.get_history_list');
    }

    /**
     * Testing - Get History Detail
     *
     * @param Request $request
     *
     * @return Response
     */
    public function get_history_detail(Request $request)
    {
        return view('api_check.quiz.get_history_detail');
    }

    /**
     * Testing - Set Result
     *
     * @param Request $request
     *
     * @return Response
     */
    public function set_result(Request $request)
    {
        return view('api_check.quiz.set_result');
    }

    /**
     * Testing - Set Question
     *
     * @param Request $request
     *
     * @return Response
     */
    public function set_question(Request $request)
    {
        return view('api_check.quiz.set_question');
    }

}
