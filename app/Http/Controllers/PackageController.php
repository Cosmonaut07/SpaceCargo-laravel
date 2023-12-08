<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create(CreatePackageRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        if (Package::create($data)) {
            return response()->json(['message' => 'Created Successfully', 'data' => $data]);
        }
        return response()->json(['message' => 'Failed to create', 'data' => $data])->setStatusCode(500);

    }

    public function update(UpdatePackageRequest $request, $id)
    {

        if (Package::find($id)->update($request->validated())) {
            return response()->json(['message' => 'Updated Successfully']);
        }
        return response()->json(['message' => 'Failed to update'])->setStatusCode(500);
    }
}
