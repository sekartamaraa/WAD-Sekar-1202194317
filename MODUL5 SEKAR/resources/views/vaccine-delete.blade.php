@extends('app')
@section('body')
    <div class="container mt-5 text-center">
        <form action="{{ route('vaccine.destroy', $vaccine->id) }}" method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <div class="mb-3">
                <p>Apakah anda yakin ingin menghapus?</p>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Yakin</button>
        </form>
    </div>
@endsection
