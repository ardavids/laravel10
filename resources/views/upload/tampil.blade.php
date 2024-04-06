@extends('template')
@section('main')
    <table class="table">
        <h2>Upload</h2>
        <form class="d-flex" action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3 w-50">
                <input type="file" class="form-control" id="inputGroupFile02" name="image">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>


        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{ asset($item->image) }}" style="width: 70px; height: 70px;" alt="img"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
