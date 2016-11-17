@extends('layouts.app')

@section('content')
<div class="container page">
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
          <dd>{{ date('F d, Y', strtotime($meeting->date)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Subject : </dt>
          <dd> {{ $meeting->subject }}</dd> 
        </dl>
        <dl class="dl-horizontal">
          <dt>Promoter : </dt>
          <dd> {{ $meeting->user->name }}</dd> 
        </dl>          
      </div>
    </div>
  </div>
  <div class="row meetingsection">
    <h1>Contributors ({{count($participants)}})</h1>
    <hr>
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
              <td>User not registered</td> 
              <td>
                <a href="/"><button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </button></a>
                 <a href="/"><button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button></a>
              </td>
            </tr>
            <?php $contributerRow++ ?>
            @endforeach
          </tbody>
        </table>            
      </div>
    </div>
  </div>
  <div class="row meetingsection">
    <h1>Documents ({{count($documents)}})</h1>
    <hr>
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
              <td>{{ $document->document_path }}</td> 
              <td>
                <a href="{{ $document->document_path }}"><button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                </button></a>
                <a href="/"><button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button></a>
              </td>
            </tr> 
            <?php $documentRow++ ?>
            @endforeach
          </tbody>
        </table>                
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <!-- Standar Form -->
        <h4>Select files from your computer</h4>
        <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
          <div class="form-inline">
            <div class="form-group">
              <input type="file" name="files[]" id="js-upload-files" multiple>
            </div>
            <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
          </div>
        </form>
</div>
</div>
</div>
</div>
@endsection

<!-- Comment :  <table class="table table-striped doctable">
          <thead> 
            <tr> 
              <th>#</th> 
              <th>First Name</th> 
              <th>Last Name</th> 
              <th>Username</th>
              <th>Role</th>
              <th>Action</th>
            </tr> 
          </thead> 
          <tbody> 
            <tr> 
              <th scope=row>1</th> 
              <td>Arsim</td> 
              <td>Hysen</td> 
              <td>arsim@gmail.com</td>
              <td>Promoter</td>
              <td>
                <button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </button>
              </td>
            </tr>
          </tbody>
        </table>  -->
