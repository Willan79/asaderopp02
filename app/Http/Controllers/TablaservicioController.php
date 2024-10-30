<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TablaservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $servicios = Servicio::all(); // Obtiene todos los servicios de la base de datos
        return view('admin.tabla-servicio', compact('servicios')); // Envía los servicios a la vista
    }
     #para crear un nuevo servicio
     public function newService()
     {
         return view('admin.nuevo-servicio');
     }
    // Mostrar el formulario para editar un servicio existente
    public function edit($id)
    {
        $servicio = servicio::findOrFail($id); // Buscar el servicio por ID
        return view('admin.editar-servicio', compact('servicio')); // Mostrar el formulario de editar servicio
    }

    // Actualizar los datos de un servicio existente
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $this->validate($request,[
            'nombre_servicio' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Buscar el servicio por ID
        $servicio = Servicio::findOrFail($id);

        // Manejar la subida de una nueva imagen (si se proporciona una nueva)
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($servicio->imagen) {
                Storage::delete('public/' . $servicio->imagen);
            }
            // Subir la nueva imagen
            $imagePath = $request->file('imagen')->store('imagenes_servicio', 'public');
            $servicio->imagen = $imagePath;
        }
        // Actualizar los datos del servicio
        $servicio->nombre_servicio = $request->nombre_servicio;
        $servicio->descripcion = $request->descripcion;

        // Guardar los cambios en la base de datos
        $servicio->save();

        // Redirigir a una página o mostrar un mensaje de éxito
        return redirect()->route('tabla-servicio', $servicio->id)->with('success', 'servicio actualizado con éxito');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);

        // Eliminar la imagen si existe
        if ($servicio->imagen) {
            Storage::delete('public/' . $servicio->imagen);
        }

        // Eliminar el servicio
        $servicio->delete();

        return redirect()->back()->with('success', 'El servicio ha sido eliminado con éxito');
    }
    
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_servicio' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Manejar la subida de la imagen
        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('imagenen', 'public');
        }

        // Guardar los datos en la base de datos
        Servicio::create([
            'nombre_servicio' => $request->nombre_servicio,
            'descripcion' => $request->descripcion,
            'imagen' => $imagePath, // Guardar la ruta de la imagen
        ]);

        return redirect()->route('tabla-servicio')->with('success', 'El servicio ha sido creado con éxito');
    }

}
