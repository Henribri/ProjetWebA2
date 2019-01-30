@extends('layout')

@section('css_link')
<link rel="stylesheet" type="text/css" href="/css/suggestion_box_style.css">
@endsection

@section('header_content')
<h1>Boîte à idée</h1>
@endsection

@section('main_content')


@foreach($Events as $Event)


<div class ="global_container">
<div class="container">
                    <h2>{{$Event->Name_event}}</h2>


                     <p>{{$Event->Description_event}}</p>
                    
                     <div class="button">
                     <form action="" method="post">
                        {{ csrf_field() }}
                        <!-- Vote -->
                        <button class="form" name="id_event" value="{{$Event->Id_event}}"> <img src="/pictures/vote.png" alt="Photo Cesi"/></button>
                    </form>



                    @if(session()->get('Status_user')=='Tuteur')
                    <form action="/notify" method="post">
                         {{ csrf_field() }}
                        <button class="notify" name='id_event' value='{{$Event->Id_event}}'> <img src="/pictures/bell.png" alt="Cloche notifié"/></button>
                    </form>
                    @endif

                    @if(session()->get('Status_user')=='BDE')
                    <form action="/create_upgrade_event" method="post">
                         {{ csrf_field() }}
                    <button class ="reuse" type='submit' name='id_event' value='{{$Event->Id_event}}'> <img src="/pictures/reuse.png" alt="Photo Cesi"/></button>
                    </form>
                    @endif
                    </div>

                    
                    @if($errors->has('info'))
                    <div class="info" name="info">
                        <p>{{$errors->first('info')}}</p>
                    </div>
                    @endif



</div>
@endforeach
</div>
@endsection


@section('script_link')

@endsection