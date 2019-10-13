@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('update-profile') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ $info->location }}" required>
                        </div>

                        <div class="form-group">
                            <label for="about">About Me</label>
                            <textarea name="about" id="about" cols="30" rows="10" class="form-control" required>{{ $info->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <p class="text-center">
                                <button class="btn btn-md btn-success" type="submit">Update Info</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
