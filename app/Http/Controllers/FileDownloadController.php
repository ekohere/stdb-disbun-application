<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileDownloadRequest;
use App\Http\Requests\UpdateFileDownloadRequest;
use App\Repositories\FileDownloadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FileDownloadController extends AppBaseController
{
    /** @var  FileDownloadRepository */
    private $fileDownloadRepository;

    public function __construct(FileDownloadRepository $fileDownloadRepo)
    {
        $this->fileDownloadRepository = $fileDownloadRepo;
    }

    /**
     * Display a listing of the FileDownload.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fileDownloads = $this->fileDownloadRepository->all();

        return view('file_downloads.index')
            ->with('fileDownloads', $fileDownloads);
    }

    /**
     * Show the form for creating a new FileDownload.
     *
     * @return Response
     */
    public function create()
    {
        return view('file_downloads.create');
    }

    /**
     * Store a newly created FileDownload in storage.
     *
     * @param CreateFileDownloadRequest $request
     *
     * @return Response
     */
    public function store(CreateFileDownloadRequest $request)
    {
        $input = $request->all();

        $fileDownload = $this->fileDownloadRepository->create($input);

        Flash::success('File Download saved successfully.');

        return redirect(route('fileDownloads.index'));
    }

    /**
     * Display the specified FileDownload.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fileDownload = $this->fileDownloadRepository->find($id);

        if (empty($fileDownload)) {
            Flash::error('File Download not found');

            return redirect(route('fileDownloads.index'));
        }

        return view('file_downloads.show')->with('fileDownload', $fileDownload);
    }

    /**
     * Show the form for editing the specified FileDownload.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fileDownload = $this->fileDownloadRepository->find($id);

        if (empty($fileDownload)) {
            Flash::error('File Download not found');

            return redirect(route('fileDownloads.index'));
        }

        return view('file_downloads.edit')->with('fileDownload', $fileDownload);
    }

    /**
     * Update the specified FileDownload in storage.
     *
     * @param int $id
     * @param UpdateFileDownloadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileDownloadRequest $request)
    {
        $fileDownload = $this->fileDownloadRepository->find($id);

        if (empty($fileDownload)) {
            Flash::error('File Download not found');

            return redirect(route('fileDownloads.index'));
        }

        $fileDownload = $this->fileDownloadRepository->update($request->all(), $id);

        Flash::success('File Download updated successfully.');

        return redirect(route('fileDownloads.index'));
    }

    /**
     * Remove the specified FileDownload from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fileDownload = $this->fileDownloadRepository->find($id);

        if (empty($fileDownload)) {
            Flash::error('File Download not found');

            return redirect(route('fileDownloads.index'));
        }

        $this->fileDownloadRepository->delete($id);

        Flash::success('File Download deleted successfully.');

        return redirect(route('fileDownloads.index'));
    }
}
