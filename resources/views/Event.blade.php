<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event</title>
</head>
<body>
    <!--Ici on a notre formulaire et on affiche les erreurs à notre utilisateurs -->
    <form method='post'>
        {{ csrf_field() }}

        <select name='num_event' value="{{old('num_event')}}">
            <option value= 1>Foot</option>

        </select>
        @if($errors->has('Id_user'))
            {{$errors->first('Id_user')}}
        @endif
        

        <input type='email' name='email_user' placeholer='Email' value="{{old('email_user')}}">
        @if($errors->has('email_user'))
            {{$errors->first('email_user')}}
        @endif


        
        <select name='localisation_user' value="{{old('localisation_user')}}">
            <option value='Arras'>Arras</option>
            <option value='Rouen'>Rouen</option>
            <option value='Lille'>Lille</option>
            <option value='Paris'>Paris</option>
        </select>
        <input type='submit' name='validation' placeholder='OK'>
    </form>
    
</body>
</html>