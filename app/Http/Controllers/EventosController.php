<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eventos;
use App\Models\User;

class EventosController extends Controller
{
    public function evento()
    {
        $search = request('search');
        
        if ($search) {
            $banco = eventos::where('title', 'like', '%' . $search . '%')->get();
        } else {
            $banco = eventos::all();
        }
        
        return view('welcome', ['banco' => $banco,'search'=>$search]);
    }
    
    public function form(){
        return view('form');
    }
    public function register(Request $request){
        $banco = New eventos;
        $banco->title =$request->title ;
        $banco->city = $request->city;
        $banco->describe = $request->describe ;
        $banco->items = $request->item ;
        $banco->private= $request->private ;
        $banco->private= $request->private ;
        $banco->data= $request->data ;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('images'), $imageName);
            $banco->image = $imageName;
        }

        $user = auth()->user();
        $banco->user_id = $user->id;

       $banco->save();

        return redirect('/');
    }
    public function view($id){
        $user = auth()->user();
        $HasUserJoined = false;
        $search = true;
    
        if ($user) {
            // Obtém todos os eventos em que o usuário está participando
            $userEventos = $user->eventosAsParticipant->toArray();
            foreach ($userEventos as $userEvento) {
                if ($userEvento['id'] == $id) {
                    $HasUserJoined = 'search';
                    break;
                }
            }
        }

        $banco = eventos::FindOrFail($id);
        $donoevento = User::where('id', $banco->user_id)->first()->toArray();
        return view('view', [ 'banco'=> $banco, 'donoevento'=>$donoevento, 'presenca'=>$HasUserJoined, 'search' => $search]);
    }
    public function dashboard(){

        $user = auth()->user();
        $banco = $user->eventos;
        $eventosAsParticipant = $user->eventosAsParticipant;
        return view('/dashboard',['banco'=>$banco,'eventosAsParticipant' =>$eventosAsParticipant]);
    }
    public function edit($id){
        $user = auth()->user();
        $banco = eventos::FindOrFail($id);
        if($user->id =! $banco->user_id){
            redirect('welcome');
        };
        return view('edit',['banco'=>$banco]);
    }
    public function update(Request $request){

        $dados = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('images'), $imageName);
            $dados['image'] = $imageName;
        }
        $banco = eventos::all();
        eventos::FindOrFail($request->id)->update($dados);
        return view('welcome',['banco'=>$banco]);
    }
    public function destroy($id){
       eventos::FindOrFail($id)->delete();
       $banco  = eventos::all();
       return view('/welcome',['banco'=>$banco]);
    }
    public function join($id){
        $user = auth()->user();
        $user->eventosAsParticipant()->attach($id);
        $banco = eventos::all();
        return view('welcome',['banco'=>$banco]);
     }
     public function leave($id){
        $user = auth()->user();
        $user->eventosAsParticipant()->detach($id);
        $banco = eventos::all();
        return view('welcome',['banco'=>$banco]);
     }
}

