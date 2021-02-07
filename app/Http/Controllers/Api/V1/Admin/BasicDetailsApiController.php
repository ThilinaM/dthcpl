<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBasicDetailRequest;
use App\Http\Requests\UpdateBasicDetailRequest;
use App\Http\Resources\Admin\BasicDetailResource;
use App\Models\BasicDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicDetailsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('basic_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BasicDetailResource(BasicDetail::all());
    }

    public function store(StoreBasicDetailRequest $request)
    {
        $basicDetail = BasicDetail::create($request->all());

        if ($request->input('logo', false)) {
            $basicDetail->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        return (new BasicDetailResource($basicDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BasicDetail $basicDetail)
    {
        abort_if(Gate::denies('basic_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BasicDetailResource($basicDetail);
    }

    public function update(UpdateBasicDetailRequest $request, BasicDetail $basicDetail)
    {
        $basicDetail->update($request->all());

        if ($request->input('logo', false)) {
            if (!$basicDetail->logo || $request->input('logo') !== $basicDetail->logo->file_name) {
                if ($basicDetail->logo) {
                    $basicDetail->logo->delete();
                }

                $basicDetail->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($basicDetail->logo) {
            $basicDetail->logo->delete();
        }

        return (new BasicDetailResource($basicDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BasicDetail $basicDetail)
    {
        abort_if(Gate::denies('basic_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $basicDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
