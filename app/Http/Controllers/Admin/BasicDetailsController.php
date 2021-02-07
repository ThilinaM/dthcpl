<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBasicDetailRequest;
use App\Http\Requests\StoreBasicDetailRequest;
use App\Http\Requests\UpdateBasicDetailRequest;
use App\Models\BasicDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BasicDetailsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('basic_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $basicDetails = BasicDetail::with(['media'])->get();

        return view('admin.basicDetails.index', compact('basicDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('basic_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.basicDetails.create');
    }

    public function store(StoreBasicDetailRequest $request)
    {
        $basicDetail = BasicDetail::create($request->all());

        if ($request->input('logo', false)) {
            $basicDetail->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $basicDetail->id]);
        }

        return redirect()->route('admin.basic-details.index');
    }

    public function edit(BasicDetail $basicDetail)
    {
        abort_if(Gate::denies('basic_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.basicDetails.edit', compact('basicDetail'));
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

        return redirect()->route('admin.basic-details.index');
    }

    public function show(BasicDetail $basicDetail)
    {
        abort_if(Gate::denies('basic_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.basicDetails.show', compact('basicDetail'));
    }

    public function destroy(BasicDetail $basicDetail)
    {
        abort_if(Gate::denies('basic_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $basicDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyBasicDetailRequest $request)
    {
        BasicDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('basic_detail_create') && Gate::denies('basic_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BasicDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
