@extends('layout.master')

@section('Content')
    <div class="container mt-5">
        <H1 class="d-flex  justify-content-center my-3">Update Contents</H1>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('home.index') }}"  class="btn btn-info me-md-0">Back</a>
        </div>
        <form action="{{ route("home.update",$data->id) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Ajmain Akash" value="{{ $data->name }}">
            </div>
            <div class="mb-2 text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $data->email }}">
            </div>
            <div class="mb-2 text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="You Can Write Description Here..">{{ $data->description }}</textarea>
            </div>
            <div class="mb-2 text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image Upload</label>
                <input class="form-control" type="file" name="image" id="formFile" value="{{ $data->image }}">
                <img src="{{ $data->image }}" alt="" width="50px">
            </div>
            <div class="mb-2 text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $data->date }}">
            </div>
            <div class="mb-2 text-danger">
                @error('date')
                    {{ $message }}
                @enderror
            </div>
            <div class="d-md-flex justify-content-md-center my-2">
                <button class="btn btn-dark btn-lg" name="submit">submit</button>
            </div>
        </form>
    </div>
@endsection
