@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/event-1_style.css">
@endsection

@section('header_content')
<h1>Evènements</h1>
@endsection

@section('main_content')
<!--Navigation bar-->
<div id="container_nav">
        <ul>
            <li><a href="month_events">Evènements du mois</a></li>
            <li><a href="past_events">Evènements passés</a></li>
            <li ><a href= "create_event">Créer un évènement</a></li>
            <li ><a href= "create_idea">Créer une idée</a></li>
            <li ><a href= "hidden_events">Evènements cachés</a></li>
        </ul>
</div>

<div class ="global_container"> <!--global_container allow to place event -->
    <div class="container">    <!--container allow to put informations of event -->
        <h2>Titre de lévènement</h2>
        <img class= "events" src="/pictures/cesi.jpg" alt="Photo Cesi"/></a>
        <!--Import button for upload picture on the website-->
        <div class="import">
            <label for="file" class="label-file">Choisir une image</label>
            <input id="file" class="input-file" type="file">
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
        </p>

         <div class="button">
            <textarea name="comment" cols="30" rows="3"placeholder="Taper votre commentaire"></textarea>   <!--Textarea dor  write a comment-->
            <button class="comment">Commenter</button> <!--Button comment-->
         </div>
         <!--Button for notify event, like event, and download pictures-->
        <div class="button">
            <button class="like"> <img src="/pictures/like.png" alt="Like"/></button>
            <button class="notify"> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
            <button class="download"> <img src="/pictures/download.png" alt="Télécharger les images"/></button>
        </div>
        <!--Allow to display comments-->
        <h3>Les commentaires</h3>
            <div class="button comments">
                <p>Henri il est trop beau !!!</p>
                <button class="notify_2"> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
            </div>
            <div class="button comments">
                <p>C'est pas du responsive !!!</p>
                <button class="notify_2"> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
            </div>
            <div class="button comments">
                <p>DK fait le rapport !!!</p>
                <button class="notify_2"> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
            </div>
     
    </div>
</div>

@endsection

@section('script_link')

@endsection