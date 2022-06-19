<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDatasetRequest;
use App\Http\Requests\UpdateDatasetRequest;
use App\Repositories\DatasetRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Http;
use Response;

class DatasetController extends AppBaseController
{
    /** @var  DatasetRepository */
    private $datasetRepository;

    public function __construct(DatasetRepository $datasetRepo)
    {
        $this->datasetRepository = $datasetRepo;
    }

    /**
     * Display a listing of the Dataset.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $datasets = $this->datasetRepository->all();

        return view('datasets.index')
            ->with('datasets', $datasets);
    }

    /**
     * Show the form for creating a new Dataset.
     *
     * @return Response
     */
    public function create()
    {
        return view('datasets.create');
    }

    /**
     * Store a newly created Dataset in storage.
     *
     * @param CreateDatasetRequest $request
     *
     * @return Response
     */
    public function store(CreateDatasetRequest $request)
    {
        $input = $request->all();

        try{
            $response = Http::withHeaders(['Authorization' => env('SATUDATA_KEY')])
                ->post('https://data.kutaitimurkab.go.id/api/3/action/package_create',[
                    "language"=>			["INDONESIA"],
                    "metadata_language"=>	"INDONESIA",
                    "owner_org"=>			env('ORG_ID'),
                    "notes"=>				$input['notes'],
                    "name"=> 				strtolower(str_replace(" ","-",$input['name'])),
                    "title"=>				$input['name']
                ])->json();

            if (!empty($response)){
                if ($response['success']==true){
                    $input['id'] = $response['result']['id'];
                    $input['owner_org_id'] = $response['result']['organization']['id'];
                    $input['org_name'] = $response['result']['organization']['title'];
                    $dataset = $this->datasetRepository->create($input);
                    Flash::success('Dataset saved successfully.');

                    return redirect(route('datasets.index'));
                }else{
                    Flash::error('Dataset failed to saved to CKAN: '.$response);
                    return redirect(route('datasets.index'));
                }
            }
        }catch (\Exception $exception){
            Flash::error('Dataset failed to saved: '.$exception);

            return redirect(route('datasets.index'));
        }



    }

    /**
     * Display the specified Dataset.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataset = $this->datasetRepository->find($id);

        if (empty($dataset)) {
            Flash::error('Dataset not found');

            return redirect(route('datasets.index'));
        }

        return view('datasets.show')->with('dataset', $dataset);
    }

    /**
     * Show the form for editing the specified Dataset.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataset = $this->datasetRepository->find($id);

        if (empty($dataset)) {
            Flash::error('Dataset not found');

            return redirect(route('datasets.index'));
        }

        return view('datasets.edit')->with('dataset', $dataset);
    }

    /**
     * Update the specified Dataset in storage.
     *
     * @param int $id
     * @param UpdateDatasetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatasetRequest $request)
    {
        $dataset = $this->datasetRepository->find($id);

        if (empty($dataset)) {
            Flash::error('Dataset not found');

            return redirect(route('datasets.index'));
        }

        $dataset = $this->datasetRepository->update($request->all(), $id);

        Flash::success('Dataset updated successfully.');

        return redirect(route('datasets.index'));
    }

    /**
     * Remove the specified Dataset from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataset = $this->datasetRepository->find($id);

        try{
            $response = Http::withHeaders(['Authorization' => env('SATUDATA_KEY')])
                ->post('https://data.kutaitimurkab.go.id/api/3/action/package_delete',[
                    "id"=> $dataset->id
                ])->json();

            if (!empty($response)){
                if ($response['success']==true){
                    $this->datasetRepository->delete($id);
                    Flash::success('Dataset deleted successfully.');
                    return redirect(route('datasets.index'));
                }else{
                    Flash::error('Dataset failed to delete from CKAN: '.$response);
                    return redirect(route('datasets.index'));
                }
            }
        }catch (\Exception $exception){
            Flash::error('Dataset failed to delete from CKAN: '.$exception->getMessage());
            return redirect(route('datasets.index'));
        }
    }
}
