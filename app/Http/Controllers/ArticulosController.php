<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Exception;

class ArticulosController extends Controller
{

    /**
     * Display a listing of the articulos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $articulos = Articulo::with('categoria')->paginate(25);

        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new articulo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categorias = Categoria::pluck('nombre','id')->all();
        
        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a new articulo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Articulo::create($data);

            return redirect()->route('articulos.articulo.index')
                ->with('success_message', 'Articulo was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified articulo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $articulo = Articulo::with('categoria')->findOrFail($id);

        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified articulo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $categorias = Categoria::pluck('nombre','id')->all();

        return view('articulos.edit', compact('articulo','categorias'));
    }

    /**
     * Update the specified articulo in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $articulo = Articulo::findOrFail($id);
            $articulo->update($data);

            return redirect()->route('articulos.articulo.index')
                ->with('success_message', 'Articulo was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified articulo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $articulo = Articulo::findOrFail($id);
            $articulo->delete();

            return redirect()->route('articulos.articulo.index')
                ->with('success_message', 'Articulo was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'descripcion' => 'string|min:1|nullable',
            'precio' => 'string|min:1|nullable|numeric|max:999999999.99',
            'costo' => 'string|min:1|nullable|numeric|max:999999999.99',
            'categoria_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
