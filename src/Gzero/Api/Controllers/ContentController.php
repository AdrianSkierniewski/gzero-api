<?php namespace Gzero\Api\Controllers;

use Gzero\Repositories\Content\ContentRepository;
use Illuminate\Routing\Controller;

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
class ContentController extends Controller {

    protected $contentRepo;

    public function __construct(ContentRepository $content)
    {
        $this->contentRepo = $content;
    }

    public function index()
    {
        $list = $this->contentRepo->listBy()->get();
        return $this->contentRepo->loadTranslations($list);
    }

    public function show($id)
    {
        return $this->contentRepo->getById($id);
    }
} 
