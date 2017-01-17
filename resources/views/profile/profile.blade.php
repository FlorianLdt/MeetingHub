@extends('layouts.app')

@section('content')
<div class="content">
  <div class="title">
    My Profile
</div>
</div>

<div class="container page">
    <div class="row meetingsection">
     <h1>Account Information</h1> 
     
     <hr>
     <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <dl class="dl-horizontal">
          <dt>Name : </dt>
          <dd>{{ ($user->name) }}</dd>
      </dl>
      <dl class="dl-horizontal">
          <dt>Email : </dt>
          <dd>{{ ($user->email) }}</dd>
      </dl>
  </div>
</div>



<h1>My Meetings</h1>

<hr>
<div class="container">
    <div class="card-columns">
        @foreach ($meetings as $meeting)
        <div class="card card-block text-xs-center card-metting">
            <h4 class="card-title"><a href="{{ route('meeting.show',$meeting->id) }}"> {{ $meeting->name }}</a></h4>
            <p class="meeting-author-card"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $meeting->user->name }}</p>
            <p class="card-text">{{ $meeting->subject }}</p>
            @if($meeting->user_id == Auth::user()->id)
            <a href="{{ route('meeting.edit',$meeting->id) }}" class="btn btn-primary btn-card">Modify</a>
                    {{ Form::open(['route' => ['meeting.destroy', $meeting->id], 'class' => '', 'method' => 'DELETE']) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-card')) }}
            {{ Form::close() }}
            @endif
        </div>
        @endforeach    

    </div>
</div>
</div>
</div>


@endsection