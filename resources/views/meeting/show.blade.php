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
    <h1>Contributors</h1>
    <hr>
    <div class="row">
      <div class="row col-md-8 col-md-offset-2">
        <table class="table table-striped doctable">
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
            <tr> 
              <th scope=row>2</th> 
              <td>Yassine</td> 
              <td>Fernane</td> 
              <td>yassine@gmail.com</td>
              <td>Participant</td>
              <td></td>
            </tr> 
            <tr> 
              <th scope=row>3</th> 
              <td>Florian</td> 
              <td>Ludot</td> 
              <td>florian@gmail.com</td> 
              <td>Participant</td>
              <td></td>
            </tr>
          </tbody>
        </table>                
      </div>
    </div>
  </div>
  <div class="row meetingsection">
    <h1>Documents</h1>
    <hr>
    <div class="row">
      <div class="row col-md-8 col-md-offset-2">
        <table class="table table-striped doctable">
          <thead> 
            <tr> 
              <th>#</th> 
              <th>Title</th> 
              <th>Author</th> 
              <th>Actions</th>
            </tr> 
          </thead> 
          <tbody> 
            <tr> 
              <th scope=row>1</th> 
              <td>bilan_activité.docx</td> 
              <td>Arsim Hysen</td> 
              <td>
                <button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
              </td>
            </tr> 
            <tr> 
              <th scope=row>2</th> 
              <td>compte_rendu.docx</td> 
              <td>Yassine Fernane</td> 
              <td>
                <button type="button" class="btn btn-default btn-default">
                  <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                </button>
              </td>
            </tr>
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

        <!-- Drop Zone -->
        <h4>Or drag and drop files below</h4>
        <div class="upload-drop-zone" id="drop-zone">
          Just drag and drop files here
        </div>

        <!-- Progress Bar -->
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
            <span class="sr-only">60% Complete</span>
          </div>
        </div>       
      </div>
    </div>
  </div>
</div>
@endsection
