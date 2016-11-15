
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Style -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                margin-top: 100px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* layout.css Style */
.upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}

.doctable > thead > tr > th,
.doctable > tbody > tr > th,
.doctable > tfoot > tr > th,
.doctable > thead > tr > td,
.doctable > tbody > tr > td,
.doctable > tfoot > tr > td {
  padding: 8px;
  line-height: 2.5;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
        </style>
        </head>
    <body>
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="top-left links">
            	<a href="{{ url('/')}}"> Home</a>
				<a href="{{ url('/meeting')}}"> Meeting List</a>
			</div>
    	<div class="container">
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


    </body>
</html>

nom : <b>{{ $meeting->name }}</b><br>
date : <b>{{ date('F d, Y', strtotime($meeting->date)) }}</b><br>
créée le : <b>{{ date('d/m/Y H:i', strtotime($meeting->created_at)) }}</b><br>
modifiée le : <b>{{ date('d/m/Y H:i', strtotime($meeting->updated_at)) }}</b><br>
sujet : <b>{{ $meeting->subject }}</b>

<br>
<br>
<br>

<a href="{{ url('/')}}"> accueil</a>
<a href="{{ url('/meeting')}}"> liste des meeting</a>

@if(Auth::user()->id == $meeting->user_id)
<a href="{{ url('/meeting/' . $meeting->id . '/edit')}}"> editer</a>
@endif


<br>
<br>
<br>
<hr>
{{ dump($meeting->user->name) }}
