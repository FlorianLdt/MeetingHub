@extends('layouts.app')

@section('content')
<div class="container page">
<div class="links grayLink">
  <a href="{{ url('/meeting') }}" class="grayLink">Retour à la liste des réunions</a>
</div>
  <div class="title m-b-md text-center">
    {{ $meeting->name }}           

    </div>
  <div class="row meetingsection">
    <h1>Overview</h1>
    <hr>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <dl class="dl-horizontal">
          <dt>Date : </dt>
          <dd>{{ date('F d, Y g:i A', strtotime($meeting->date)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Subject : </dt>
          <dd class="justify"> {{ $meeting->subject }}</dd> 
        </dl>
        <dl class="dl-horizontal">
          <dt>Promoter : </dt>
          <dd> {{ $meeting->user->name }}</dd> 
        </dl>          
      </div>
    </div>
    @if($meeting->user_id == Auth::user()->id)
    <div class="row gestionButtons col-md-6 col-md-offset-3">
      <div class="row">          
        <a href="{{ route('meeting.edit',$meeting->id) }}" class="btn btn-primary meetingGestButton" >Modify the meeting</a>
      </div>
    <div class="row">
      {{ Form::open(['route' => ['meeting.destroy', $meeting->id], 'class' => '', 'method' => 'DELETE']) }}
            {{ Form::submit('Delete the meeting', array('class' => 'btn btn-danger meetingGestButton')) }}
        {{ Form::close() }}
    </div> 
    </div>
     
    @endif 
    </div>
  <div class="row meetingsection">
    <h1>Contributors ({{count($participants)}})</h1>
    <hr>
    @if(count($participants) != 0)
    <div class="row">
      <div class="row col-md-8 col-md-offset-2">
        <table class="table table-striped doctable">
          <thead> 
            <tr> 
              <th>#</th> 
              <th>Email</th> 
              <th>Name</th> 
              <th>Action</th>
            </tr> 
          </thead> 
          <tbody> 
          <?php $contributerRow=1 ?>
          @foreach($participants as $participant)
          
            <tr> 
              <th scope=row>{{$contributerRow}}</th> 
              <td>{{ $participant->email_participant }}</td> 
              @if(empty($participant->name))
              <td>User not registered</td> 
              @else
              <td>{{$participant->name}}</td> 
              @endif
              <td>
                @if(!empty($participant->name))
                <a href="/profile/{{$participant->id}}"><button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </button></a>
                @endif
                </td>
                <td>
                  @if(Auth::user()->id == $meeting->user_id)

                 {{ Form::open(['route' => ['participant.destroy',  $participant->meeting_id,$participant->email_participant], 'class' => '']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
                {{ Form::close() }}

                @else
                <p>Aucune action disponible</p>
                @endif
                </td>
                
              
            </tr>
            <?php $contributerRow++ ?>
            @endforeach
              
            @if(Auth::user()->id == $meeting->user_id)              
            {{ Form::open(['route' => ['participant.store', $meeting->id],  'method' => 'POST']) }}
            <tr>
              <th scope=row>{{$contributerRow}}</th> 
              <td>{{ Form::input('text', 'email_participant',  '', ['class' => 'form-control'] ) }}</td> 
              <td>
                {{ Form::hidden('meeting_id', $meeting->id) }}
                {!! Form::submit('Add contributor', ['class' => 'btn btn-primary pull-right']) !!}
              </td>
            </tr>
			{!! Form::close() !!}  
            @endif
              
          </tbody>
        </table>            
      </div>
    </div>
    @else
    <p>There is no contributor in this meeting</p>
        
        @if(Auth::user()->id == $meeting->user_id)        
       <div class="row">
            <div class="row col-md-8 col-md-offset-2">
                <table class="table table-striped doctable">
                    <thead> 
            <tr> 
              <th>#</th> 
              <th>Email</th> 
              <th>Name</th> 
              <th>Action</th>
            </tr> 
          </thead> 
                    <tbody> 
                {{ Form::open(['route' => ['participant.store', $meeting->id],  'method' => 'POST']) }}
                <tr>
                  <th></th> 
                  <td>{{ Form::input('text', 'email_participant',  '', ['class' => 'form-control'] ) }}</td> 
                  <td></td>
                  <td>
                    {{ Form::hidden('meeting_id', $meeting->id) }}
                    {!! Form::submit('Add contributor', ['class' => 'btn btn-primary']) !!}
                  </td>
                </tr>
                {!! Form::close() !!}  
          </tbody>
        </table>            
      </div>
    </div>
      
    @endif
    @endif
  </div>
  <div class="row meetingsection">
    <h1>Documents ({{count($documents)}})</h1>
    <hr>
    @if(count($documents) != 0)
    <div class="row">
      <div class="row col-md-8 col-md-offset-2">
        <table class="table table-striped doctable">
          <thead> 
            <tr> 
              <th>#</th> 
              <th>Title</th> 
              <th>Actions</th>
            </tr> 
          </thead> 
          <tbody> 
          <?php $documentRow=1 ?>
           @foreach($documents as $document)
            <tr> 
              <th scope=row>{{$documentRow}}</th> 
              <td>{{ $document->original_filename }}</td>
              <td>
                <a href="{{ route('fichier.show', $document->id)}}"><button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                </button></a>
                
              </td>

                 @if(Auth::user()->id == $meeting->user_id)
                <td>
                {{-- form --}}
                {{ Form::open(['route' => ['fichier.destroy', $document->id], 'method' => 'DELETE']) }}
                    {{ Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class' => 'btn btn-danger', 'type' => 'submit')) }}
                {{ Form::close() }}
                </td>
                @endif
            </tr> 
            <?php $documentRow++ ?>
            @endforeach
              
            @if(Auth::user()->id == $meeting->user_id)
              {{ Form::open(['route' => ['fichier.store', $meeting->id], "files"=>true]) }}
              <tr> 
              <th></th> 

              <td>{{ Form::file('addFile', null) }}</td>
                <td>
                {{ Form::hidden('meeting_id', $meeting->id) }}
                    {!! Form::submit('add file', ['class' => 'btn btn-primary']) !!}
                </td>
            </tr>
			{!! Form::close() !!}  
            @endif 
          </tbody>
        </table>                
      </div>
    </div>
    @else
    <p>There is no file in this meeting</p>
      
    @if(Auth::user()->id == $meeting->user_id)      
    <div class="row">
        <div class="row col-md-8 col-md-offset-2">
        <table class="table table-striped doctable">
          <tbody> 
              {{ Form::open(['route' => ['fichier.store', $meeting->id], "files"=>true]) }}
              <tr> 
              <th></th> 
              <td>{{ Form::file('addFile', null) }}</td>
                <td>
                {{ Form::hidden('meeting_id', $meeting->id) }}
                    {!! Form::submit('Add file', ['class' => 'btn btn-primary']) !!}
                </td>
            </tr>
			{!! Form::close() !!}  
          </tbody>
        </table>                
      </div>
    </div>
    @endif  
      
    @endif
    <hr>

</div>
</div>
</div>
@endsection