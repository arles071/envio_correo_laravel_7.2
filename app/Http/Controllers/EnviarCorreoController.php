<?php

namespace App\Http\Controllers;

use App\Mail\EnviarCorreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EnviarCorreoController extends Controller
{
    public function index(){

        return view('enviar_correos.index');
        
    }

    public function post_correo(Request $request){
       
        $request->validate(
            [
                'email' => 'required',
                'message' => 'required'
            ]);

        $file = $request->file('documento');
        $data['message'] = $request->input('message');
        $data['email'] = $request->input('email');
        $data['title'] = "Correo de prueba";

        //print_r($file); exit;
        if($file !== null){
            //Eliminar directorio
            Storage::deleteDirectory('public/'.$data['email']);

            //crear direcrorio
            Storage::makeDirectory('public/'.$data['email']);
            $route = $file->store('public/'.$data['email']);
            $app_path = storage_path('app/'.$route);
            $data['attach'] = [
                'route' => $app_path,
                'as' => 'Documento.pdf',
                'mime' => 'application/pdf',
            ];
            //echo $route; exit;
        }
            
        
        Mail::to($data['email'])->send(new EnviarCorreo($data));
        return redirect()->back()->with('message','Correo enviado con exito');
    }
}
