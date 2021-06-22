@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8 card">
                <h1 class="card-header bg-white text-capitalize">
                    update company
                </h1>
                <form enctype="multipart/form-data" action="{{ route('companies.update', $company->id) }}"
                    class="card-body" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-capitalize">name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Please enter conpany name ..."
                                value="{{ old('name') ? old('name') : $company->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-capitalize">email</label>
                        <div class="col-md-9">
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Please enter conpany email ..."
                                value="{{ old('email') ? old('email') : $company->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo" class="col-md-3 col-form-label text-capitalize">logo</label>
                        <div class="col-md-9">
                            @if (Storage::disk('public')->exists($company->logo))
                                <img class="mb-3 img-fluid" width="100px" height="100px"
                                    src="{{ \Storage::url($company->logo) }}" alt="">
                            @endif
                            <input type="file" name="logo" id="logo" class="form-control"
                                placeholder="Please select conpany logo ...">
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button class="btn btn-primary text-capitalize">save</button>
                            <a href="{{ route('companies.index') }}" class="btn btn-default text-capitalize">cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
