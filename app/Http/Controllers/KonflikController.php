<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKonflikRequest;
use App\Http\Requests\UpdateKonflikRequest;
use App\Repositories\KonflikRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KonflikController extends AppBaseController
{
    /** @var  KonflikRepository */
    private $konflikRepository;

    public function __construct(KonflikRepository $konflikRepo)
    {
        $this->konflikRepository = $konflikRepo;
    }

    /**
     * Display a listing of the Konflik.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $konfliks = $this->konflikRepository->all();

        return view('konfliks.index')
            ->with('konfliks', $konfliks);
    }

    /**
     * Show the form for creating a new Konflik.
     *
     * @return Response
     */
    public function create()
    {
        return view('konfliks.create');
    }

    /**
     * Store a newly created Konflik in storage.
     *
     * @param CreateKonflikRequest $request
     *
     * @return Response
     */
    public function store(CreateKonflikRequest $request)
    {
        $input = $request->all();

        $konflik = $this->konflikRepository->create($input);

        Flash::success('Konflik saved successfully.');

        return redirect(route('konfliks.index'));
    }

    /**
     * Display the specified Konflik.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $konflik = $this->konflikRepository->find($id);

        if (empty($konflik)) {
            Flash::error('Konflik not found');

            return redirect(route('konfliks.index'));
        }

        return view('konfliks.show')->with('konflik', $konflik);
    }

    /**
     * Show the form for editing the specified Konflik.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $konflik = $this->konflikRepository->find($id);

        if (empty($konflik)) {
            Flash::error('Konflik not found');

            return redirect(route('konfliks.index'));
        }

        return view('konfliks.edit')->with('konflik', $konflik);
    }

    /**
     * Update the specified Konflik in storage.
     *
     * @param int $id
     * @param UpdateKonflikRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKonflikRequest $request)
    {
        $konflik = $this->konflikRepository->find($id);

        if (empty($konflik)) {
            Flash::error('Konflik not found');

            return redirect(route('konfliks.index'));
        }

        $konflik = $this->konflikRepository->update($request->all(), $id);

        Flash::success('Konflik updated successfully.');

        return redirect(route('konfliks.index'));
    }

    /**
     * Remove the specified Konflik from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $konflik = $this->konflikRepository->find($id);

        if (empty($konflik)) {
            Flash::error('Konflik not found');

            return redirect(route('konfliks.index'));
        }

        $this->konflikRepository->delete($id);

        Flash::success('Konflik deleted successfully.');

        return redirect(route('konfliks.index'));
    }
}
