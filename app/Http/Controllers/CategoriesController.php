<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable',
        ]);

        Categories::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categories created successfully.');
    }

    public function show(Categories$categories)
    {
        return view('categories.show', compact('categories'));
    }

    public function edit(Categories$categories)
    {
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, Categories$categories)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' .$categories->id . '|max:255',
            'description' => 'nullable',
        ]);

        $categories->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categories updated successfully');
    }

    public function destroy(Categories $categories)
    {
        $categories->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categories deleted successfully');
    }
}

