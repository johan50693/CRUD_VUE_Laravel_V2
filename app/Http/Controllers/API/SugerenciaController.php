<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sugerencia;

class SugerenciaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Sugerencia::where('user_id',auth()->id())->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sugerencia= new Sugerencia();
        $sugerencia->description= $request->description;
        $sugerencia->user_id= auth()->id();
        $sugerencia->save();

        return $sugerencia;
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
        $sugerencia= Sugerencia::find($id);
        $sugerencia->description= $request->description;
        $sugerencia->save();
        return $sugerencia;

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
        $sugerencia= Sugerencia::find($id);
        $sugerencia->delete();
    }
}
