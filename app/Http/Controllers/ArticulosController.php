<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Articulos;
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
        $articulosObjects = Articulos::with('categoria')->paginate(25);

        return view('articulos.index', compact('articulosObjects'));
    }

    /**
     * Show the form for creating a new articulos.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categorias = Categoria::pluck('id','id')->all();
        
        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a new articulos in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Articulos::create($data);

            return redirect()->route('articulos.articulos.index')
                ->with('success_message', 'Articulos was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified articulos.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $articulos = Articulos::with('categoria')->findOrFail($id);

        return view('articulos.show', compact('articulos'));
    }

    /**
     * Show the form for editing the specified articulos.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $articulos = Articulos::findOrFail($id);
        $categorias = Categoria::pluck('id','id')->all();

        return view('articulos.edit', compact('articulos','categorias'));
    }

    /**
     * Update the specified articulos in the storage.
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
            
            $articulos = Articulos::findOrFail($id);
            $articulos->update($data);

            return redirect()->route('articulos.articulos.index')
                ->with('success_message', 'Articulos was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified articulos from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $articulos = Articulos::findOrFail($id);
            $articulos->delete();

            return redirect()->route('articulos.articulos.index')
                ->with('success_message', 'Articulos was successfully deleted.');
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
