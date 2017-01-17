@extends('layouts.app')

@section('content')
<div class="content page">
    <div class="title">
        Meeting List
    </div>
    <div class="sub-title m-b-md">
        ({{count($meetings)}} Meetings Available)
    </div>

    <div class="text-xs-center createMeeting">
            <a href="{{ route('meeting.create') }}" class="btn btn-success btn-card">Plan a new meeting</a>
        </div>

    <div class="container">
        
        
            
        <div class="card-columns">
        @foreach ($meetings as $meeting)
        <div class="card card-block text-xs-center card-metting">
            <h4 class="card-title"><a href="{{ route('meeting.show',$meeting->id) }}"> {{ $meeting->name }}</a></h4>
            <p class="meeting-author-card"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $meeting->user->name }}</p>
            <p class="card-text">{{ $meeting->subject }}</p>
            @if($meeting->user_id == Auth::user()->id)
            <div class="row">
                <div class="row">
                    <a href="{{ route('meeting.edit',$meeting->id) }}" class="btn btn-primary btn-card">Modify</a>
                </div>
                <div class="row">
                    {{ Form::open(['route' => ['meeting.destroy', $meeting->id], 'class' => '', 'method' => 'DELETE']) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-card')) }}
            {{ Form::close() }}
                </div>
            
            
            </div>
            @endif
        </div>
        @endforeach    
    </div>
</div>
    </div>

    
    
@endsection