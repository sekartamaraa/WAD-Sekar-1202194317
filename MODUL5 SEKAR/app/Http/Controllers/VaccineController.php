<?php

namespace App\Http\Controllers;

use App\Http\Requests\VaccineEditRequest;
use App\Http\Requests\VaccineRequest;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('vaccine', ['vaccines' => $vaccines]);
    }

    public function add()
    {
        return view('vaccine-create');
    }

    public function insert(VaccineRequest $request)
    {
        $requestData = $request->all();
        $requestData['image'] = $request->file('image')->store('vaccine-images');
        Vaccine::create($requestData);
        return redirect(route('vaccine.index'));
    }

    public function edit(Vaccine $vaccine)
    {
        return view('vaccine-edit', ['vaccine' => $vaccine]);
    }

    public function update(Vaccine $vaccine, VaccineEditRequest $request)
    {
        $requestData = $request->all();
        if ($request->file('image')) {
            Storage::delete($vaccine->image);
            $requestData['image'] = $request->file('image')->store('vaccine-images');
        }
        $vaccine->update($requestData, ['timestamp' => false]);
        return redirect(route('vaccine.index'));
    }

    public function delete(Vaccine $vaccine)
    {
        return view('vaccine-delete', ['vaccine' => $vaccine]);
    }

    public function destroy(Vaccine $vaccine)
    {
        Storage::delete($vaccine->image);
        $vaccine->delete();
        return redirect(route('vaccine.index'));
    }
}
