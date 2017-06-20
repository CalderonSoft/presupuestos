<?php

namespace Budgets\Http\Controllers;

use DB;
use Budgets\Item;
use Budgets\Budget;
use Budgets\Category;
use Illuminate\Http\Request;
use Budgets\Http\Requests\CreateItemRequest;
use Budgets\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
	public function create(Category $category)
	{
		$item = new Item;
		return view('items.create')->with(['item' => $item, 'category' => $category, 'values' => $values]);
	}

    public function store(CreateItemRequest $request)
    {
        $year = $request->get('budgetYear');
    	$item = new Item;
    	$item->fill($request->only('description', 'category_id'));
    	$item->save();

    	$category = Category::find($item->category_id);

    	session()->flash('message', '¡Se ha agregado el item!');
    	// return dd($request);
    	return redirect()->route('categories_edit', ['category' => $category->id, 'year' => $year]);
    }

    public function edit(Item $item, Budget $budget, int $year)
    {
		$values = $item->values;
        // return $values;
        return view('items.edit')->with(['item' => $item, 'budget' => $budget, 'values' => $values, 'year' => $year]);

        // $items = Item::where('category_id', $category->id)->get();
        // $items = $category->items->reverse();
        // return view('categories.edit')->with(['category' => $category, 'items' => $items]);
    }

    public function update(Item $item, UpdateItemRequest $request)
    {
            $item->update(
            $request->only('description'));
        
        $category = $item->category;
        $budget = $category->budget;
        
        session()->flash('message', '¡Item actualizado!');
        $year = $request->get('budgetYear');
        return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);
    }

    public function destroy(Item $item, int $year)
    {
        $item->delete();
        $category = $item->category;
        $items = $category->items;
        session()->flash('message', '¡El Item se ha borrado!');        
        return view('categories.edit')->with(['category' => $category, 'items' => $items, 'year' => $year]);
    
    }
    
}
