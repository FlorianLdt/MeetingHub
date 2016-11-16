@extends('layouts.app')

@section('content')
<div class="content page">
    <div class="title">
        My Profile
    </div>
    <div class="sub-title m-b-md">
        Account Information
    </div>
    <p>
    	{{ ($user->name) }}
    </p>
    <p>
    	{ ($user->email) }}
    </p>
     <div class="sub-title m-b-md">
        My Meetings
    </div>
    <div class="container">
        <div class="card-columns">
    @foreach ($meetings as $meeting)
    <div class="card card-block text-xs-center card-metting">
        <h4 class="card-title"><a href="{{ route('meeting.show',$meeting->id) }}"> {{ $meeting->name }}</a></h4>
        <p class="meeting-author-card"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $meeting->user->name }}</p>
        <p class="card-text">{{ $meeting->subject }}</p>
@if($meeting->user_id == Auth::user()->id)
        <a href="{{ route('meeting.edit',$meeting->id) }}" class="btn btn-primary btn-card">Modifier</a>
        @endif
    </div>
    @endforeach    

    </div>
</div>
    </div>

    
    
@endsection