<?php namespace Gzero\Api\Controllers;

use Gzero\Api\UrlParamsProcessor;
use Gzero\Repositories\Upload\UploadRepository;
use Illuminate\Support\Facades\Response;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class UploadController
 *
 * @package    Gzero\Admin\Controllers\Resource
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class UploadController extends BaseController {

    protected
        $uploadRepo,
        $processor;

    public function __construct(UploadRepository $upload, UrlParamsProcessor $processor)
    {
        $this->uploadRepo = $upload;
        $this->processor  = $processor;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Int|null $id Content Id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id = NULL)
    {
        $page    = $this->processor->getPage();
        $orderBy = $this->processor->getOrderByParams();
        if ($id) {
            return Response::json(
                [
                    'data'  => $this->uploadRepo->getByContent($id, $page, $orderBy)->toArray(),
                    'total' => $this->uploadRepo->getLastTotal()
                ]
            );
        }
        return Response::json(
            [
                'data'  => $this->uploadRepo->get($page, $orderBy)->toArray(),
                'total' => $this->uploadRepo->getLastTotal()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return $this->uploadRepo->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
} 
