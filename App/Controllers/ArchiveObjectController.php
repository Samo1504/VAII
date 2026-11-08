<?php

namespace App\Controllers;

use App\Models\ArchiveObject;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class ArchiveObjectController extends BaseController
{

    /**
     * @inheritDoc
     */
    public function index(Request $request): Response
    {
        return $this->redirect($this->url('home.index'));
    }

    public function add(Request $request): Response
    {
        return $this->html([

        ]);
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $archiveObject = new ArchiveObject();
        $archiveObject->setFromRequest($request, ['name', 'category', 'institution', 'datum', 'stav']);
        $archiveObject->save();

        return $this->redirect($this->url('home.index'));
    }

    public function edit(Request $request): Response
    {
        return $this->html(
            [
                'archiveObject' => ArchiveObject::getOne($request->get('id'))
            ]
        );

    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $this->findArchiveObject($request)->delete();
        return $this->redirect($this->url('home.index'));
    }

    private function findArchiveObject(Request $request): ArchiveObject
    {
        $post = ArchiveObject::getOne((int)$request->value('id'));
        if ($post === null) {
            throw new HttpException(404, 'Archivny objekt neexistuje.');
        }
        return $post;
    }
}