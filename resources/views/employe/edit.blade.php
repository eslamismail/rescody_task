@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8 card">
                <h1 class="card-header bg-white text-capitalize">
                    update employe
                </h1>
                <form enctype="multipart/form-data" action="{{ route('employees.update', $employe->id) }}"
                    class="card-body" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="company_id" class="col-md-3 col-form-label text-capitalize">company</label>
                        <div class="col-md-9">

                            <select name="company_id" id="company_id" class="form-control">
                                <option selected disabled>-Please select company-</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ($employe->company_id == $company->id) selected @endif>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_name" class="col-md-3 col-form-label text-capitalize">first name</label>
                        <div class="col-md-9">
                            <input type="text" name="first_name" id="first_name" class="form-control"
                                placeholder="Please enter first name  ..." value="{{ $employe->first_name }}">
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-md-3 col-form-label text-capitalize">last name</label>
                        <div class="col-md-9">
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                placeholder="Please enter last name  ..." value="{{ $employe->last_name }}">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-capitalize">email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Please enter email  ..." value="{{ $employe->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-3 col-form-label text-capitalize">phone</label>
                        <div class="col-md-9">
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="Please enter phone  ..." value="{{ $employe->phone }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <button class="btn btn-primary text-capitalize">save</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-default text-capitalize">cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
