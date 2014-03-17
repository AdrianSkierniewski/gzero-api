<?php namespace Gzero\Api\Controllers;

use Gzero\Api\UrlParamsProcessor;
use Gzero\Repositories\Content\ContentRepository;
use Illuminate\Support\Facades\Response;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class ContentController
 *
 * @package    Gzero\Admin\Controllers\Resource
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class ContentController extends BaseController {

    protected
        $processor,
        $contentRepo;

    public function __construct(ContentRepository $content, UrlParamsProcessor $processor)
    {
        $this->contentRepo = $content;
        $this->processor   = $processor;
    }

    /**
     * Display a listing of the resource.
     *
     * @param null $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id = NULL)
    {
        $orderBy = $this->processor->getOrderByParams();
        $page    = $this->processor->getPage();
        if ($id) {
            $content = $this->contentRepo->getById($id);
            if (!empty($content)) {
                return Response::json(
                    [
                        'data'  => $this->contentRepo->getChildren($content, $page, $orderBy)->toArray(),
                        'total' => $this->contentRepo->getLastTotal()
                    ]
                );
            }
        }
        return Response::json(
            [
                'data' => $this->contentRepo->getRoots($orderBy)->toArray(),
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
        return $this->contentRepo->getById($id);
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
