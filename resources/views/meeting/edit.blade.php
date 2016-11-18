@extends('layouts.app')

@section('content')
<div class="container page">
	<div class="title m-b-md text-center">
		Edit your meeting
	</div>
	<div class="row meetingsection">
		<hr>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
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

			<hr>
	{{ Form::open(['route' => 'email.store', 'method' => 'post', 'id' => 'form-add-participant']) }}
    {{ Form::label( 'email_participant', 'E-mail :' ) }}
    {{ Form::input( 'email_participant', '', ['id' => 'email_participant', 'required' => true]) }}
    {{ Form::hidden('meeting_id', $meeting_id) }}
    {{ Form::submit( 'ajouter',['id' => 'btn-add-setting']) }}
    {{ Form::close() }}
		</div>
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