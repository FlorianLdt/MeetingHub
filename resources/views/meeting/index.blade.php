@extends('layouts.app')

@section('content')
<div class="content page">
    <div class="title">
        Meeting List
    </div>
    <div class="sub-title m-b-md">
        ({{count($meetings)}} Meetings Available)
    </div>
    
    <div class="container">
        
        <div class="card card-block text-xs-center card-metting">
            <a href="{{ route('meeting.create') }}" class="btn btn-primary btn-card">Planifier une réunion</a>
        </div>
            
        <div class="card-columns">
        @foreach ($meetings as $meeting)
        <div class="card card-block text-xs-center card-metting">
            <h4 class="card-title"><a href="{{ route('meeting.show',$meeting->id) }}"> {{ $meeting->name }}</a></h4>
            <p class="meeting-author-card"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $meeting->user->name }}</p>
            <p class="card-text">{{ $meeting->subject }}</p>
            @if($meeting->user_id == Auth::user()->id)
            <a href="{{ route('meeting.edit',$meeting->id) }}" class="btn btn-primary btn-card">Modifier</a>
            {{ Form::open(['route' => ['meeting.destroy', $meeting->id], 'class' => 'pull-right', 'method' => 'DELETE']) }}
                {{ Form::submit('Supprimer groupe', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
            @endif
        </div>
        @endforeach    
    </div>
</div>
    </div>

    
    
@endsection