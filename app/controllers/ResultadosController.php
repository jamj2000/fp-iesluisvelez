<?php



class ResultadosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$modulos = Modulo::where('profesor_id', '=', Auth::user()->id)->get();;
		return View::make('resultados.index')->with('modulos', $modulos);
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$modulo = Modulo::find($id);
		$alumnos = $a = Modulo::find($id)->alumnos;
              
                // Creamos array con los apellidos y nombre de los alumnos a ordenar
                // Creamos array con las claves sin orden
                foreach ($alumnos as $alumno) { 
                         $apellidos_nombre[$alumno['id']] = $alumno['apellido1'].' '.$alumno['apellido2'].' '.$alumno['nombre'];  
                         $id1[] = $alumno['id'];
                }
                             
                ////////////////////////////////
                // IMPORTANTE: La magia de la ordenación está aquí
                // ORDENAMOS array según apellidos y nombre
                if (extension_loaded('intl') === true)   collator_asort(collator_create('root'), $apellidos_nombre);
                ////////////////////////////////
              
                // Creamos array con las claves en orden siguiendo criterio de apellidos y nombre
                foreach ($apellidos_nombre as $key => $value)   $id2[] = $key;

                // Vaciamos colección $alumnos
                $alumnos = $alumnos->slice(0,0);
                         
                // Ponemos los elementos en orden dentro de la colección $alumnos               
                foreach ($id2 as $k)     $alumnos->push($a[array_search($k, $id1)]);
                
           
                return View::make('resultados.edit')->with('modulo', $modulo)->with('alumnos', $alumnos);
        }

        

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	     $modulo = Modulo::find($id);
	     
	     foreach($modulo->alumnos as $alumno) {
	         $alumno->pivot->r1 = Input::get('r1_'.$alumno->id);
	         $alumno->pivot->r2 = Input::get('r2_'.$alumno->id);
	         $alumno->pivot->r3 = Input::get('r3_'.$alumno->id);
	         $alumno->pivot->r4 = Input::get('r4_'.$alumno->id);
	         $alumno->pivot->r5 = Input::get('r5_'.$alumno->id);
	         $alumno->pivot->r6 = Input::get('r6_'.$alumno->id);
	         $alumno->pivot->r7 = Input::get('r7_'.$alumno->id);
	         $alumno->pivot->r8 = Input::get('r8_'.$alumno->id);
	         $alumno->pivot->r9 = Input::get('r9_'.$alumno->id);

	         $alumno->push();  // Debemos utilizar PUSH (SAVE no se aplica aquí)
	     }
	
	    /***  Redirección final ***/
	    Session::flash('message', 'Actualizado con éxito');
	    return Redirect::to('resultados/'.$id.'/edit');

        }

        
}