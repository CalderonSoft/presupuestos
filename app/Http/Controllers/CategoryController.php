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

	public function edit(Category $category)
	{
		// $items = Item::where('category_id', $category->id)->get();
		$items = $category->items->reverse();
		return view('categories.edit')->with(['category' => $category, 'items' => $items]);		
	}

	public function update(Category $category, UpdateCategoryRequest $request)
	{
		$category->update(
			$request->only('name', 'class'));
		$budget = Budget::find($category->budget_id);
		session()->flash('message', '¡Categoría actualizada!');
		return redirect()->route('budgets.show', ['budget' => $budget->id]);
	}

	public function destroy(Category $category)
	{
		$category->delete();
		$budget = Budget::find($category->budget_id);

    	session()->flash('message', '¡La categoría se ha borrado!');
    	return redirect()->route('budgets.show', ['budget' => $budget->id]);
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
