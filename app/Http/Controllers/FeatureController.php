<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Repositories\FeatureRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FeatureController extends AppBaseController
{
    /** @var  FeatureRepository */
    private $featureRepository;

    public function __construct(FeatureRepository $featureRepo)
    {
        $this->featureRepository = $featureRepo;
    }

    /**
     * Display a listing of the Feature.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $features = $this->featureRepository->all();

        return view('features.index')
            ->with('features', $features);
    }

    /**
     * Show the form for creating a new Feature.
     *
     * @return Response
     */
    public function create()
    {
        return view('features.create');
    }

    /**
     * Store a newly created Feature in storage.
     *
     * @param CreateFeatureRequest $request
     *
     * @return Response
     */
    public function store(CreateFeatureRequest $request)
    {
        $input = $request->all();

        $feature = $this->featureRepository->create($input);

        Flash::success('Feature saved successfully.');

        return redirect(route('features.index'));
    }

    /**
     * Display the specified Feature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('features.index'));
        }

        return view('features.show')->with('feature', $feature);
    }

    /**
     * Show the form for editing the specified Feature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('features.index'));
        }

        return view('features.edit')->with('feature', $feature);
    }

    /**
     * Update the specified Feature in storage.
     *
     * @param int $id
     * @param UpdateFeatureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeatureRequest $request)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('features.index'));
        }

        $feature = $this->featureRepository->update($request->all(), $id);

        Flash::success('Feature updated successfully.');

        return redirect(route('features.index'));
    }

    /**
     * Remove the specified Feature from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feature = $this->featureRepository->find($id);

        if (empty($feature)) {
            Flash::error('Feature not found');

            return redirect(route('features.index'));
        }

        $this->featureRepository->delete($id);

        Flash::success('Feature deleted successfully.');

        return redirect(route('features.index'));
    }
}
