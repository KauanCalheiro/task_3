<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Events;
use App\Models\Inscriptions;
use App\Models\Attendances;


class SyncController extends Controller
{
    public function index()
    {
         $users = User::all(['id', 'name', 'email']);
         $events = Events::all(['id', 'name']);
         $inscritions = Inscriptions::all(['id', 'ref_event', 'ref_user']);
         $attendance = Attendances::all(['ref_inscription']);
         
         $usersArray = $users->map(function ($user) {
             return [
                 'id' => $user->id,
                 'nome' => $user->name,
                 'email' => $user->email
             ];
         });
 
         $inscricoesArray = $events->map(function ($event) use ($inscritions, $attendance, $usersArray) {
             $inscricoes = $inscritions->where('ref_event', $event->id);
             $participantes = $inscricoes->map(function ($inscricao) use ($attendance, $usersArray) {
                 $user = $usersArray->firstWhere('id', $inscricao->ref_user);
                 $presenca = $attendance->contains('ref_inscription', $inscricao->id);
                 
                 return [
                     'id' => $user['id'],
                     'presenca' => $presenca
                 ];
             });
             
             return [
                 'id' => $event->id,
                 'nome' => $event->name,
                 'participantes' => $participantes
             ];
         });
 
         $response = [
             'users' => $usersArray,
             'inscricoes' => $inscricoesArray
         ];
 
         return response()->json($response);
    }
    
    public function store(Request $request)
    {
        $users = (array) $request->input('users');
        $inscricoes = (array) $request->input('inscricoes');

        foreach($users as $key => $user)
        {
            $user_exists = User::where("email", "{$user['email']}")->first();

            if($user_exists === null)
            {
                $newuser = [
                    'name' => $user['nome'],
                    'email' => $user['email'],
                    'password' => 'teste'
                ];

                $newu = User::create( $newuser );
                $users[$key]['new_id'] = $newu['id'];
                $user['new_id'] = $newu['id'];
            }
            else
            {
                $user['new_id'] = $user_exists->id;
            }

            foreach($inscricoes as $inscricao)
            {
                foreach($inscricao['participantes'] as $participante)
                {
                    if($user['id'] == $participante['id'])
                    {
                        $have_inscription = Inscriptions::where('ref_user', $user['new_id'])->where('ref_event', $inscricao['id'])->first();
                        if($have_inscription === null)
                        {
                            $newinscription = [
                                'ref_user' => $user['new_id'],
                                'ref_event' => $inscricao['id']
                            ];
                            $newi = Inscriptions::create( $newinscription );
                            $participante['newidinscription'] = $newi['id'];
                        }
                        else
                        {
                            $participante['newidinscription'] = $have_inscription->id; 
                        }

                        if($participante['presenca'] == true)
                        {
                            $have_attendance = Attendances::where('ref_inscription', $participante['newidinscription'])->first();

                            if($have_attendance === null)
                            {
                                $newattendance = [
                                    'ref_inscription' => $participante['newidinscription']
                                ];
        
                                $newi = Attendances::create( $newattendance );
                            }
                            
                        }
                    }  
                }
            }
        }

        return "Sincronização finalizada com sucesso!";
    }

}
