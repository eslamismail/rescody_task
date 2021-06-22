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
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">logo</th>
                                <th scope="col">created at</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)

                                <tr>
                                    <th scope="row">{{ $company->id }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        @if (Storage::disk('public')->exists($company->logo))
                                            <img class="img-fluid" width="100px" height="100px"
                                                src="{{ \Storage::url($company->logo) }}" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $company->created_at->toDayDateTimeString() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('companies.edit', $company->id) }}">Edit</a>
                                                <form method="post"
                                                    action="{{ route('companies.destroy', $company->id) }}"
                                                    onsubmit="return confirm('Are you sure ?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item text-capitalize">delete</button>
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
