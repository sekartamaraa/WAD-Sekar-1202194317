<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientEditRequest;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient', ['patients' => Patient::with('vaccine')->get()]);
    }

    public function vaccine()
    {
        return view('patient-vaccine', ['vaccines' => Vaccine::get()]);
    }

    public function add(Vaccine $vaccine)
    {
        return view('patient-create', ['vaccine' => $vaccine]);
    }

    public function insert(Vaccine $vaccine, PatientRequest $request)
    {
        $requestData = $request->all();
        $requestData['image_ktp'] = $request->file('image_ktp')->store('ktp-images');
        $requestData['vaccine_id'] = $vaccine->id;
        Patient::create($requestData);
        return redirect(route('patient.index'));
    }

    public function edit(Patient $patient)
    {
        $patient = $patient->load('vaccine');
        return view('patient-edit', ['patient' => $patient]);
    }

    public function update(Patient $patient, PatientEditRequest $request)
    {
        $requestData = $request->all();
        if ($request->file('image_ktp')) {
            Storage::delete($patient->image_ktp);
            $requestData['image_ktp'] = $request->file('image_ktp')->store('ktp-images');
        }
        $patient->update($requestData, ['timestamp' => false]);
        return redirect(route('patient.index'));
    }

    public function delete(Patient $patient)
    {
        return view('patient-delete', ['patient' => $patient]);
    }

    public function destroy(Patient $patient)
    {
        Storage::delete($patient->image_ktp);
        $patient->delete();
        return redirect(route('patient.index'));
    }
}
