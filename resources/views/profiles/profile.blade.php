@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $user->name }}'s Profile
            </div>

            <div class="panel-body">
                <img src="{{ Storage::url($user->avatar) }}" alt="{{$user->name}}" height="70px" width="70px" style="border-radius:50%">
            </div>
        </div>
    </div>
</div>
@endsection()