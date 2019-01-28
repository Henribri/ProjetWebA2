<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Likes;
use App\Photos;
use App\Events;
use App\Status;
use App\Users;
use Illuminate\Support\Facades\DB;
use App\Mail\Notification;
use App\Mail\IdeeRetenue;
use Illuminate\Support\Facades\Mail;
class PhotosCtrl extends Controller
{
    //
    function View_photos(){

        
        $Id_event=request('id_event');


       $photos = Photos::
            join('_event', '_event.Id_event', '=', '_photo.Id_event')
            ->where([
                ['_photo.Id_event', $Id_event],
                ['public_photo', 1]
            ])
            ->get();
             




        return view('Photos',[
            'Photos'=>$photos,
            'Comments'=>Comments::all(),

        ]);

    }

    function Create_comments(){

        if(session()->get('Status_user')){

            request()->validate([
                'comment_comment'=>['required'],
            ]);
    
        DB::transaction(function () {
        $Comment= Comments::create([
            'Comment_comment'=>request('comment_comment'),
            'Id_user'=>session()->get('Id_user'),
            'Id_photo'=>request('id_photo'),
            'Public_comment'=>1,
    
        ]);
        });

        return back();

        }

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }

    function Delete_comments(){
        
        if(session()->get('Status_user')=='Tuteur'){

        DB::transaction(function () {
           Comments::
            where( 'Id_comment',request('id_comment'))
            ->delete();
        });

            $BDE = Users::
            join('_status', '_user.Id_status', '=', '_status.Id_status')
            ->select('Email_user')
            ->where('_status.Status', 'BDE')
            ->get();

            //
        for($i=0; $i<count($BDE); $i++){
            
            $Member=$BDE[$i]->Email_user;
            $tuteur_name=session()->get('Name_user');
            $tuteur_surname=session()->get('Surname_user');
            $type='Commentaire';
            $Name_event='commentaire supprimé';//a changer par request(name_event)
    
            Mail::to($Member)->send(new Notification($tuteur_name, $tuteur_surname, $type, $Name_event));


        }

            return back();

            //TO DO send mail notif

            
        }

    }


    function Like(){

        try{
        if(session()->get('Status_user')){

            DB::transaction(function () {
            Likes::create([
                'Id_user'=>session()->get('Id_user'),
                'Id_photo'=>request('id_photo'),       
            ]);
            });

            return back();


        }}catch(\Illuminate\Database\QueryException $e){
                
              return "vous avez deja like la photo";//renvoyer erreur dans la div info
            }
        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);
    }



    public function Notify_photo(){
        //TO DO Session verifier status = Tuteur

        if(session()->get('Status_user')=='Tuteur'){

            request()->validate(['id_photo'=>['required']]);

            DB::transaction(function () {
            Photos::where('Id_photo', request('id_photo'))
            ->update([
                'Id_user_approve'=>session()->get('Id_user'),//Session utilisateur 
                'Date_Approbation_photos'=>date('Y/m/d'),
                'Public_photo'=>0,//rend non public
        ]);
            });


       $Photo=Photos::
            select('Id_event')
            ->where('Id_photo', request('id_photo'))
            ->first();


        $Event= Events::
        where('Id_event', $Photo->Id_event)
        ->first();
    //$users=Users::all();

        $BDE = Users::
            join('_status', '_user.Id_status', '=', '_status.Id_status')
            ->select('Email_user')
            ->where('_status.Status', 'BDE')
            ->get();

            //
        for($i=0; $i<count($BDE); $i++){
            
            $Member=$BDE[$i]->Email_user;
            $tuteur_name=session()->get('Name_user');
            $tuteur_surname=session()->get('Surname_user');
            $type='Photo';
            $Name_event=$Event->Name_event;//a changer par request(name_event)
    
            Mail::to($Member)->send(new Notification($tuteur_name, $tuteur_surname, $type, $Name_event));


        }


            }
            return redirect('/connexion')->withErrors([
                'email_user' => 'Vous devez être tuteur pour faire cette action'
                ]);
    }
}
