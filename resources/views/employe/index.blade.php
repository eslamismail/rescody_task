@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="table-responsive">
                    @if ($message = Session::get('success_message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="text-capitalize">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">first name</th>
                                <th scope="col">last name</th>
                                <th scope="col">email</th>
                                <th scope="col">phone</th>
                                <th scope="col">company name</th>
                                <th scope="col">created at</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ @$item->company->name }}</td>
                                    <td>{{ @$item->created_at->toDayDateTimeString() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('employees.edit', $item->id) }}">Edit</a>
                                                {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                                <form onsubmit="return confirm('Are you sure ?')"
                                                    action="{{ route('employees.destroy', $item->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
