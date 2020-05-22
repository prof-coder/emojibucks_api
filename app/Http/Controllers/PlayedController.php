<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayedRequest;
use App\Http\Requests\UpdatePlayedRequest;
use App\Repositories\PlayedRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PlayedController extends AppBaseController
{
    /** @var  PlayedRepository */
    private $playedRepository;

    public function __construct(PlayedRepository $playedRepo)
    {
        $this->playedRepository = $playedRepo;
    }

    /**
     * Display a listing of the Played.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $playeds = $this->playedRepository->all();

        return view('playeds.index')
            ->with('playeds', $playeds);
    }

    /**
     * Show the form for creating a new Played.
     *
     * @return Response
     */
    public function create()
    {
        return view('playeds.create');
    }

    /**
     * Store a newly created Played in storage.
     *
     * @param CreatePlayedRequest $request
     *
     * @return Response
     */
    public function store(CreatePlayedRequest $request)
    {
        $input = $request->all();

        $played = $this->playedRepository->create($input);

        Flash::success('Played saved successfully.');

        return redirect(route('playeds.index'));
    }

    /**
     * Display the specified Played.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $played = $this->playedRepository->find($id);

        if (empty($played)) {
            Flash::error('Played not found');

            return redirect(route('playeds.index'));
        }

        return view('playeds.show')->with('played', $played);
    }

    /**
     * Show the form for editing the specified Played.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $played = $this->playedRepository->find($id);

        if (empty($played)) {
            Flash::error('Played not found');

            return redirect(route('playeds.index'));
        }

        return view('playeds.edit')->with('played', $played);
    }

    /**
     * Update the specified Played in storage.
     *
     * @param int $id
     * @param UpdatePlayedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlayedRequest $request)
    {
        $played = $this->playedRepository->find($id);

        if (empty($played)) {
            Flash::error('Played not found');

            return redirect(route('playeds.index'));
        }

        $played = $this->playedRepository->update($request->all(), $id);

        Flash::success('Played updated successfully.');

        return redirect(route('playeds.index'));
    }

    /**
     * Remove the specified Played from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $played = $this->playedRepository->find($id);

        if (empty($played)) {
            Flash::error('Played not found');

            return redirect(route('playeds.index'));
        }

        $this->playedRepository->delete($id);

        Flash::success('Played deleted successfully.');

        return redirect(route('playeds.index'));
    }
}
