<?php namespace Gzero\Api\Controllers;

use Gzero\Api\UrlParamsProcessor;
use Gzero\Repositories\Content\ContentRepository;

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
     * @return Response
     */
    public function index()
    {
        $orderBy = $this->processor->getOrderByParams();
        $page    = $this->processor->getPage();
        return $this->contentRepo->onlyPublic()->get($page, $orderBy);
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
