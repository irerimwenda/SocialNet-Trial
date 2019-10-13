@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center">
                    {{ $user->name }}'s Profile
                </p>
            </div>

            <div class="panel-body">
                <center>
                    <img src="{{ Storage::url($user->avatar) }}" alt="{{$user->name}}" height="140px" width="140px" style="border-radius:50%">
                </center>
            </div>
        </div>
    </div>
</div>
@endsection()