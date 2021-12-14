@extends('app')
@section('body')
    <div class="container mt-5">
        @if(count($vaccines) > 0)
            <h3>
                <center>List Vaccine</center>
            </h3>
            <a href="{{ route('vaccine.add') }}" class="btn btn-primary">Add Vaccine</a>
            <table class="table table-primary mt-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($vaccines as $vaccine)
                    <tr>
                        <th scope="row">{{ ($loop->index+1) }}</th>
                        <td>{{ $vaccine->name }}</td>
                        <td>Rp {{ $vaccine->price }}</td>
                        <td>
                            <a href="{{ route('vaccine.edit', $vaccine->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('vaccine.delete', $vaccine->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">There is no data....</p>
            <div class="text-center">
                <a href="{{ route('vaccine.add') }}" class="btn btn-primary">Add Vaccine</a>
            </div>
        @endif
    </div>
@endsection
