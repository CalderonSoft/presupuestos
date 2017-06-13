<?php

namespace Budgets\Http\Controllers;

use Budgets\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
	public function create()
	{
		$category = new Category;
		return view ('categories.create', compact('category'));
	}

	public function edit()
	{
		# code...
	}

	public function store(CreateCategoryRequest $request)
	{
		$category = new Category;
		$category->fill($request->only('name', 'class', 'budget_id'));
		$category->save();

		$budget = Budget::find($category->budget_id);

		session()->flash('message', '¡La categoría ha sido creada!');
		return redirect()->route('budgets.show')->with(['budget' => $budget]);
	}

}
