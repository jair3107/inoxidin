<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios'] = User::where('email', '!=', 'epaoap@hotmail.com')->paginate(100);

        return view('users.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|password|max:1000',
        ];
        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);

        $datosUser = request()->except('_token'); 
        
        $datosUser['password'] = Hash::make($datosUser['password']); 

        User::insert($datosUser);

        return redirect('usuarios')->with('Mensaje','Usuario agregado con exito');
        
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
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
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
        $campos=[
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
        ];

        $Mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request, $campos, $Mensaje);


        $datosUser = request()->except(['_token', '_method']);

        User::where('id', '=', $id)->update($datosUser);

        return redirect('usuarios')->with('Mensaje','Usuario modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = User::findOrFail($id);
            $user->delete();

        return redirect('usuarios')->with('Mensaje','Usuario eliminado con exito');
    }
}
