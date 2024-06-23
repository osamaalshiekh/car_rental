@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Roles to User: {{ $user->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                            <li class="breadcrumb-item active">Assign Roles</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assign Roles</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.updateUserRoles', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Roles</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
