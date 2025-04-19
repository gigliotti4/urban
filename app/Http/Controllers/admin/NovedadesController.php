<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Novedades;
use App\Models\CategoriaNovedades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NovedadesController extends Controller
{
    public function index()
    {
        $novedades = Novedades::all();
        return view('admin.novedades.index', compact('novedades'));
    }

    public function create()
    {
       
        return view('admin.novedades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Añadir extensiones y tamaño máximo
            
        ]);
    
        // Procesar la imagen
        $imagenPath = $request->file('imagen')->store('novedades', 'public');
    
        // Crear la nueva novedad
        $novedad = new Novedades();
        $novedad->orden = $request->orden;
        $novedad->titulo = $request->titulo;
        $novedad->descripcion = $request->descripcion;
        $novedad->descripcion_corto = $request->descripcion_corto;
        $novedad->imagen = $imagenPath;
      
        $novedad->save();

        return redirect()->route('admin.novedades.index')->with('success', 'La novedad fue creada con exitosamente.');
    }

    public function edit($id)
    {
        $novedad = Novedades::findOrFail($id);
       
        return view('admin.novedades.edit', compact('novedad'));
    }

    public function update(Request $request, $id)
    {
        $novedad = Novedades::findOrFail($id);

        $request->validate([
            'orden' => 'required|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'descripcion_corto' => 'nullable|string',
            'imagen' => 'nullable|image',
           
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            if ($novedad->imagen) {
                Storage::disk('public')->delete($novedad->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('novedades', 'public');
        }

        $novedad->update($data);
        return redirect()->route('admin.novedades.index')->with('success', 'novedad actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $novedad = Novedades::findOrFail($id);

        if ($novedad->imagen) {
            Storage::disk('public')->delete($novedad->imagen);
        }

        $novedad->delete();
        return redirect()->route('admin.novedades.index')->with('danger', 'novedad eliminado exitosamente.');
    }
}
