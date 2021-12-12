@extends('app')
@section('body')
    <div class="container mt-5">
        @if(count($patients) > 0)
            <h3><center>List Patient</center></h3>
            <a href="{{ route('patient.vaccine') }}" class="btn btn-primary">Register Patient</a>
            <table class="table table-primary mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vaccine</th>
                        <th>Name</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $patient->vaccine->name }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->nik }}</td>
                            <td>{{ $patient->alamat }}</td>
                            <td>{{ $patient->no_hp }}</td>
                            <td>
                                <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('patient.delete', $patient->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">There is no data....</p>
            <div class="text-center">
                <a href="{{ route('patient.vaccine') }}" class="btn btn-primary">Register Patient</a>
            </div>
        @endif
    </div>
@endsection
