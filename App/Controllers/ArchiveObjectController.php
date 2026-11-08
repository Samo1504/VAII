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
        return $this->html(['archiveObject' => null]);
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $archiveObject = $request->post('id') !== null
            ? $this->findArchiveObject($request)
            : new ArchiveObject();
        $archiveObject->setFromRequest($request, ['name', 'category', 'institution', 'datum', 'stav']);
        $archiveObject->save();

        return $this->redirect($this->url('home.index'));
    }

    public function edit(Request $request): Response
    {
        return $this->html([
            'archiveObject' => $this->findArchiveObject($request),
        ]);
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
        $archiveObject = ArchiveObject::getOne((int)$request->value('id'));
        if ($archiveObject === null) {
            throw new HttpException(404, 'Archívny objekt neexistuje.');
        }
        return $archiveObject;
    }
}