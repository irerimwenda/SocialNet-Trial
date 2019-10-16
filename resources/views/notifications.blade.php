@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Notifications</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($notifications as $notification)
                            <li class="list-group-item">
                                {{ $notification->data['name'] }} &nbsp; {{ $notification->data['message'] }} <span class="pull-right">{{$notification->created_at->diffForHumans()}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
