<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//spatie
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-permisos|crear-permisos|editar-permisos|borrar-permisos', ['only'=>['index']]);
        $this->middleware('permission:crear-permisos', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-permisos', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-permisos', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permission::simplePaginate(8);

        return view('permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permisos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = count($request->input('name'));

        request()->validate([
            'name' => 'required'
        ]);

        for ($i=0; $i < $count; $i++) { 
            $permiso = new Permission;
            $permiso -> name = $request->input('name.'.$i.'');
            $permiso->save();
        }

        return redirect()->route('permisos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
