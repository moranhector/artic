<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Exception;

class CategoriasController extends Controller
{

    /**
     * Display a listing of the categorias.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categorias = Categoria::paginate(25);

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new categoria.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('categorias.create');
    }

    /**
     * Store a new categoria in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Categoria::create($data);

            return redirect()->route('categorias.categoria.index')
                ->with('success_message', 'Categoria was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified categoria.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified categoria.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified categoria in the storage.
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
            
            $categoria = Categoria::findOrFail($id);
            $categoria->update($data);

            return redirect()->route('categorias.categoria.index')
                ->with('success_message', 'Categoria was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified categoria from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();

            return redirect()->route('categorias.categoria.index')
                ->with('success_message', 'Categoria was successfully deleted.');
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
                'nombre' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
