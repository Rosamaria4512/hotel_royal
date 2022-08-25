<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Service;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $site = Site::simplePaginate(3);
        return view('sites.index', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones = request()->validate([
            'municipio'=>'required',
            'lugar'=>'required',
            'horario_atencion'=>'required',
            'foto' => 'required',

        ]);

        if (isset($validaciones)) {
        $sitio = new Site();
        $sitio->municipio = $request->municipio;
        $sitio->lugar = $request->lugar;
        $sitio->nombre =$request->nombre;
        $sitio->direccion = $request->direccion;
        $sitio->telefono =$request->telefono;
        $sitio->correo = $request->correo;
        $foto =$request->file('foto');
        $foto->move('img', $foto->getClientOriginalName());
        $sitio->foto = $foto->getClientOriginalName();
        $sitio->descripcion = $request->descripcion;
        $sitio->tipo_actividad =$request->tipo_actividad;
        $sitio->horario_atencion = $request->horario_atencion;
        $sitio->estado=$request->estado;

        $sitio->save();
        session()->flash('message', 'Sitio creado satisfactoriamente!!');
        //metodo route trabaja con las rutas
        return redirect()->route('sitio.create');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        $services = Service::join("sites","services.sites_id","=","sites.id")
        ->where("sites_id",$site->id)
        ->select("services.servicio","services.precio")
        ->get();
        return view('sites.show',compact('site', 'services'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return view('sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $site=Site::find($id);
        $site->municipio = $request->municipio;
        $site->lugar = $request->lugar;
        $site->nombre =$request->nombre;
        $site->direccion = $request->direccion;
        $site->telefono =$request->telefono;
        $site->correo = $request->correo;
        $site->descripcion = $request->descripcion;
        $site->tipo_actividad =$request->tipo_actividad;
        $site->horario_atencion = $request->horario_atencion;
        $site->estado=$request->estado;

        $site->save();
        return redirect()->route('sitio.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
