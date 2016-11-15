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