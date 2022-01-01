<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSTDBProfileRequest;
use App\Http\Requests\UpdateSTDBProfileRequest;
use App\Repositories\STDBProfileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class STDBProfileController extends AppBaseController
{
    /** @var  STDBProfileRepository */
    private $sTDBProfileRepository;

    public function __construct(STDBProfileRepository $sTDBProfileRepo)
    {
        $this->sTDBProfileRepository = $sTDBProfileRepo;
    }

    /**
     * Display a listing of the STDBProfile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBProfiles = $this->sTDBProfileRepository->all();

        return view('s_t_d_b_profiles.index')
            ->with('sTDBProfiles', $sTDBProfiles);
    }

    /**
     * Show the form for creating a new STDBProfile.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_t_d_b_profiles.create');
    }

    /**
     * Store a newly created STDBProfile in storage.
     *
     * @param CreateSTDBProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBProfileRequest $request)
    {
        $input = $request->all();

        $sTDBProfile = $this->sTDBProfileRepository->create($input);

        Flash::success('S T D B Profile saved successfully.');

        return redirect(route('sTDBProfiles.index'));
    }

    /**
     * Display the specified STDBProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sTDBProfile = $this->sTDBProfileRepository->find($id);

        if (empty($sTDBProfile)) {
            Flash::error('S T D B Profile not found');

            return redirect(route('sTDBProfiles.index'));
        }

        return view('s_t_d_b_profiles.show')->with('sTDBProfile', $sTDBProfile);
    }

    /**
     * Show the form for editing the specified STDBProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sTDBProfile = $this->sTDBProfileRepository->find($id);

        if (empty($sTDBProfile)) {
            Flash::error('S T D B Profile not found');

            return redirect(route('sTDBProfiles.index'));
        }

        return view('s_t_d_b_profiles.edit')->with('sTDBProfile', $sTDBProfile);
    }

    /**
     * Update the specified STDBProfile in storage.
     *
     * @param int $id
     * @param UpdateSTDBProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBProfileRequest $request)
    {
        $sTDBProfile = $this->sTDBProfileRepository->find($id);

        if (empty($sTDBProfile)) {
            Flash::error('S T D B Profile not found');

            return redirect(route('sTDBProfiles.index'));
        }

        $sTDBProfile = $this->sTDBProfileRepository->update($request->all(), $id);

        Flash::success('S T D B Profile updated successfully.');

        return redirect(route('sTDBProfiles.index'));
    }

    /**
     * Remove the specified STDBProfile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sTDBProfile = $this->sTDBProfileRepository->find($id);

        if (empty($sTDBProfile)) {
            Flash::error('S T D B Profile not found');

            return redirect(route('sTDBProfiles.index'));
        }

        $this->sTDBProfileRepository->delete($id);

        Flash::success('S T D B Profile deleted successfully.');

        return redirect(route('sTDBProfiles.index'));
    }
}
