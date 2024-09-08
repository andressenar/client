<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://127.0.0.1:8000/v1/categories';
    }

    public function index()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            $categories = $response->json();
            return view('categories.index', compact('categories'));
        } else {
            return redirect()->route('categories.index')->withErrors('No se pudieron obtener las categorías.');
        }
    }

    public function show($id)
    {
        $response = Http::get("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            $category = $response->json();
            return view('categories.show', compact('category'));
        } else {
            return redirect()->route('categories.index')->withErrors('Categoría no encontrada.');
        }
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $response = Http::post($this->baseUrl, $data);

        if ($response->successful()) {
            return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
        } else {
            return back()->withErrors('No se pudo crear la categoría.');
        }
    }

    public function edit($id)
    {
        $response = Http::get("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            $category = $response->json();
            return view('categories.edit', compact('category'));
        } else {
            return redirect()->route('categories.index')->withErrors('Categoría no encontrada.');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $response = Http::put("{$this->baseUrl}/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente.');
        } else {
            return back()->withErrors('No se pudo actualizar la categoría.');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente.');
        } else {
            return back()->withErrors('No se pudo eliminar la categoría.');
        }
    }
}

