@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="css/past_events_style.css">
@endsection

@section('header_content')
<h1>Evènements passés</h1>
@endsection

@section('main_content')
<div id="container_nav">
        <ul>
            <li><a href="events_month">Evènements du mois</a></li>
            <li><a href="events_past">Evènements passés</a></li>
            <li ><a href= "create_event">Créer un évènement</a></li>
            <li ><a href= "create_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
</div>
@foreach($Events as $Event)


<div class ="global_container">
<div class="container">
            <p>{{$Event->Name_event}}</p>
            <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>

            
                     <p>{{$Event->Description_event}}</p>
                     <form action="/photos" method="get">
                     {{ csrf_field() }}   
                     <button class ="comment" name="id_event" value="{{$Event->Id_event}}" type="submit">Voir les photos</button>
                     </form>

</div>
@endforeach
</div>
@endsection


@section('script_link')

@endsection