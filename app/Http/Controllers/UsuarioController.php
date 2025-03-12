<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cargo;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-user|crear-user|editar-user|borrar-user', ['only'=>['index']]);
        $this->middleware('permission:crear-user', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-user', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-user', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::simplePaginate(50);

        return view('usuarios.usuariocrud', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = "USU";
        $num = "0000";
        $cods = [];
        $x = User::all();
        foreach ($x as $a) {
            $cods[] = $a->num;
        }

        $co =  end($cods);
        $coda = $co + 1;
        $codx = strval($coda);
        if ($co > 8){
            $num = "000";
        }elseif ($co > 98){
            $num = "00";
        }elseif ($co > 998){
            $num = "0";
        }
        $texto = $cod.$num;
        $codigo = $texto.$codx;

        $cargos = Cargo::all();
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.usuarionuevo', compact('roles', 'cargos', 'codigo', 'coda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'cod_emp' => 'required',
            'roles' => 'required',
            'celular' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user -> assignRole($request->input('roles'));
        return redirect()->route('User-admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.usuariodetalle', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $cargos = Cargo::all();
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $usuario->roles->pluck('name', 'name')->all();
        return view('usuarios.usuarioedit', compact('usuario', 'roles', 'cargos', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required',
        ]);

        $usuario = User::findOrFail($id);
        $usuario -> estado = $request->input('estado');
        $usuario -> id_cargo = $request->input('id_cargo');
        $usuario -> celular = $request->input('celular');
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $usuario->assignRole($request->input('roles'));
        $usuario->save();
        return redirect()->route('User-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('User-admin.index');
    }
}
