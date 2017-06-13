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

	public function edit(Category $category)
	{
		return view('categories.edit', compact('category'));		
	}

	public function update(Category $category, UpdateCategoryRequest $request)
	{
		# code...
	}

	// public function update(Budget $budget, UpdateBudgetRequest $request)
	// {
	// 	$budget->update(
	// 			$request->only('name', 'description'));
	// 	session()->flash('message', '¡Presupuesto actualizado!');
	// 	return redirect()->route('budgets.index');
	// }

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
