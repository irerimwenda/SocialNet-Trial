@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <p class="text-center">
                    {{ $user->name }}'s Profile
                </p>
            </div>

            <div class="card-body">
                <center>
                    <img src="{{ Storage::url($user->avatar) }}" alt="{{$user->name}}" height="140px" width="140px" style="border-radius:50%">
                </center>

                <br/>

                <p class="text-center">
                    {{ $user->profile->location }}
                </p>

                <p class="text-center">
                    @if(Auth::id() == $user->id)
                        <a href="{{ route('edit-profile') }}" class="btn btn-sm btn-outline-info">Edit Profile</a>
                    @endif()
                </p>
            </div>
        </div>

        <br>

        <div class="card">

            <div class="card-header">
                <p class="text-center">
                    About Me
                </p>
            </div>
            <div class="card-body">
                <p class="text-center">
                    {{ $user->profile->about }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection()