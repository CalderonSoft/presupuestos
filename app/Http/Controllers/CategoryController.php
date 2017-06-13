<?php

namespace Budgets\Http\Controllers;

use Budgets\Category;
use Budgets\Budget;
use Illuminate\Http\Request;
use Budgets\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    
	public function create(Budget $budget)
	{
		$category = new Category;
		return view ('categories.create')->with(['category' => $category, 'budget' => $budget]);
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
		// return $budget;
		return redirect()->route('budgets.show', ['budget' => $budget->id]);
	}

}
