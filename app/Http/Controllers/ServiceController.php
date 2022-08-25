<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Site;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $servicios = Service::all();
        //  return view('services.index', compact('servicios'));

        $servicios = Service::simplePaginate(3);
        return view('services.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitios= Site::All();
        return view ('services.create', compact('sitios'));
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
            'servicio' => 'required',
            'precio' => 'required',
            'foto' => 'required',
            
        ]);
        
        if (isset($validaciones)) {
            $servicio = new Service();
            $servicio->servicio = $request->servicio;
            $servicio->precio = $request->precio;
            $foto =$request->file('foto');
            $foto->move('img', $foto->getClientOriginalName());
            $servicio->foto = $foto->getClientOriginalName();
            $servicio->sites_id= $request->sites_id;
            $servicio->save();
            session()->flash('message', 'Servicio creado satisfactoriamente!!');
            //metodo route trabaja con las rutas
            return redirect()->route('servicio.create');
            //view para trabajar la svistas
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
