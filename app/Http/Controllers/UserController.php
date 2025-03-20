<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function funListar()
    {
        //SQL
        $usuarios = DB::select("SELECT * FROM users");
        //Query Builder
        //$usuarios = DB::table("users")->get();
        //Eloquent
        //$usuarios = User::all();
        return $usuarios;
    }
    public function funGuardar(Request $request)
    {
        $nombre = $request->name;
        $correo = $request->email;
        $password = $request->password;

        $usuario = new User();
        $usuario->name = $nombre;
        $usuario->email = $correo;
        $usuario->password = $password;
        $usuario->save();

        return ["mensaje" => "El Usuario a sido Almacenado"];
    }
    public function funMostrar($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json($usuario, 200);
    }
     
    public function funModificar(Request $request, $id)
    {
        $nombre = $request->name;
        $correo = $request->email;
        $password = $request->password;

        $usuario = User::findOrFail($id);
        $usuario->name = $nombre;
        $usuario->email = $correo;
        $usuario->password = $password;
        $usuario->update();

        return response()->json(["mensaje" => "El Usuario a sido Modificado"], 201);
    }
    public function funEliminar($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return response()->json(["mensaje" => "El Usuario a sido Eliminado"], 200);
    }
}


