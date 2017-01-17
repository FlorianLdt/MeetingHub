@extends('layouts.app')

@section('content')
<div class="container page">
	<div class="title m-b-md text-center">
		Edit your meeting<br>
	</div>
	<div class="row meetingsection">
		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div><br>
		@endif
			<small><a href="{{ route('meeting.show',$meeting->id) }}">Voir : {{ $meeting->name }}</a></small>

		<hr>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!-- echo Form::open(array('url' => 'foo/bar', 'method' => 'put')) -->

				{!! Form::open( ['route' => ['meeting.update', $meeting->id], 'method' => 'PUT'] ) !!} 
				<dl class="dl-horizontal">
					<dt>Name : </dt>
					<dd>{{ Form::input('text', 'name', $meeting->name, ['class' => 'form-control']) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Date : </dt>
					<dd>{{ Form::input('text', 'date',  $meeting->date, ['class' => 'form-control'] ) }}</dd> 
				</dl>
				<dl class="dl-horizontal">
					<dt>Subject : </dt>
					<dd>{{ Form::textarea('subject', $meeting->subject, ['class' => 'form-control']) }}</dd> 
				</dl>
				<dl class="dl-horizontal">
					<dd>{!! Form::submit('Edit meeting', ['class' => 'btn btn-primary btn-lg btn-full-width']) !!}</dd>
				</dl>   
			</div>
			{!! Form::close() !!}

		</div>
		<hr>    
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				{{ Form::open(['route' => ['participant.store', $meeting->id],  'method' => 'POST']) }}
				<dl class="dl-horizontal">
					<dt>Email : </dt>
					<dd>{{ Form::input('text', 'email_participant',  '', ['class' => 'form-control'] ) }}</dd>
				</dl>
				{{ Form::hidden('meeting_id', $meeting->id) }}
				<dl class="dl-horizontal">
					<dd>{!! Form::submit('add contributor', ['class' => 'btn btn-primary btn-lg btn-full-width']) !!}</dd>
				</dl>   
			</div>
			{!! Form::close() !!}

		</div>

		<hr>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				{{ Form::open(['route' => ['fichier.store', $meeting->id], "files"=>true]) }}
				<dl class="dl-horizontal">
					<dt>{!! Form::label('Fichier :') !!}</dt>
					<dd>{{ Form::file('addFile', null) }}</dd>
				</dl>
				{{ Form::hidden('meeting_id', $meeting->id) }}
				<dl class="dl-horizontal">
					<dd>{!! Form::submit('add file', ['class' => 'btn btn-primary btn-lg btn-full-width']) !!}</dd>
				</dl>   
			</div>
			{!! Form::close() !!}

		</div>
		<hr>

	</div>
</div>

@endsection

<!-- 

RL::route('users.index') // Show all users links to UserController@index

URL::route('users.show',$user->id) // Show user with id links to UserController@show($id)

URL::route('users.create') // Show Userform links to UserController@create

URL::route('users.store') // Links to UserController@store

URL::route('users.edit',$user->id) // Show Editform links to UserController@edit($id)

URL::route('users.update',$user->id) // Update the User with id links to UserController@update($id)

URL::route('users.destroy',$user->id) // Deletes a user with the id links to UserController@destroy

-->