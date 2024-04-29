
@extends('layouts.layout')
@section('content')
    <div class="shadow p-3 bg-body-tertiary rounded d-grid gap-2 col-6 mx-auto mt-5 ">
        <h4><strong>Edit Profile</strong></h4>
        <form action="{{ route('update-profile', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-1">
                <input type="text" class="form-control" name="editName" value="{{ $user->name }}">
            </div>

            <div class="form-group mt-1">
                <input type="text" class="form-control" name="editEmail" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group mt-1">
                <input type="text" class="form-control" name="editPassword" placeholder="password">
            </div>
            <div class="mt-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Edit Profile</button>
            </div>
        </form>
    </div>
@endsection

