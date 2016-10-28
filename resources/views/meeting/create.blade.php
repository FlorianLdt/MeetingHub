<!-- echo Form::open(array('url' => 'foo/bar', 'method' => 'put')) -->

{!! Form::open( ['route' => 'meeting.store'] ) !!} 

	name :
	{{ Form::input('text', 'name') }}
	date :
	{{ Form::input('text', 'date',   date("Y-m-d H:i:s") ) }}


	subject :
	{{ Form::input('text', 'subject') }}

{!! Form::submit('Create New meeting', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



<hr>

<a href="{{ url('/')}}"> accueil</a>
<a href="{{ url('/meeting')}}"> liste des meeting</a>


<!-- 

RL::route('users.index') // Show all users links to UserController@index

URL::route('users.show',$user->id) // Show user with id links to UserController@show($id)

URL::route('users.create') // Show Userform links to UserController@create

URL::route('users.store') // Links to UserController@store

URL::route('users.edit',$user->id) // Show Editform links to UserController@edit($id)

URL::route('users.update',$user->id) // Update the User with id links to UserController@update($id)

URL::route('users.destroy',$user->id) // Deletes a user with the id links to UserController@destroy

-->