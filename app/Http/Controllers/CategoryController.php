<?php

namespace Budgets\Http\Controllers;

use Budgets\Item;
use Budgets\Category;
use Budgets\Budget;
use Illuminate\Http\Request;
use Budgets\Http\Requests\CreateCategoryRequest;
use Budgets\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

	public function create(Budget $budget)
	{
		$category = new Category;
		return view ('categories.create')->with(['category' => $category, 'budget' => $budget]);
	}

	public function edit(Category $category, int $year)
	{
		// $items = Item::where('category_id', $category->id)->get();
		$items = $category->items;
		return view('categories.edit')->with(['category' => $category, 'items' => $items, 'year' => $year]);
	}

	public function update(Category $category, UpdateCategoryRequest $request)
	{
		$category->update(
			$request->only('name', 'class'));
		$budget = Budget::find($category->budget_id);
		session()->flash('message', '¡Categoría actualizada!');
		$year = $request->get('budgetYear');
		return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);
	}

	public function destroy(Category $category, int $year)
	{
		$category->delete();
		$budget = Budget::find($category->budget_id);

    	session()->flash('message', '¡La categoría se ha borrado!');
    	return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);
	}


	public function store(CreateCategoryRequest $request)
	{
		$year = $request->get('budgetYear');
		$category = new Category;
		$category->fill($request->only('name', 'class', 'budget_id'));
		$category->save();

		$budget = Budget::find($category->budget_id);

		session()->flash('message', '¡La categoría ha sido creada!');
		// return $budget;
		return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);
	}

}
