@extends('layout.master')
@section('Content')

<section>
    <div class="container mt-5">
        <H1 class="d-flex  justify-content-center my-3">Showing Contents</H1>
        <div class="d-md-flex justify-content-md-end my-2">
            <a href="{{ route('home.create') }}"  class="btn btn-info me-md-2">Create   </a>
        </div>

        <table class="table table-dark table-striped table-hover ">
            <thead>
              <tr >
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
              <tr valign="middle">
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->description }}</td>
                <td> <img src="{{ $item->image }}" alt="" style="width: 50px;"></td>
                <td>{{ $item->date }}</td>
                <td><a href="{{ route('delete', $item->id) }}" class="btn btn-danger mx-3">Delete</a>
                    <a href="{{ route('home.edit', $item->id) }}" class="btn btn-success">Update</a></td>

              </tr>
              @endforeach
          </table>
    </div>
</section>


@endsection
