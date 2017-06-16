<?php

namespace Budgets\Http\Controllers;

use DB;
use Budgets\Item;
use Budgets\Budget;
use Budgets\Category;
use Illuminate\Http\Request;
use Budgets\Http\Requests\CreateItemRequest;

class ItemController extends Controller
{
	public function create(Category $category)
	{
		$item = new Item;
		return view('items.create')->with(['item' => $item, 'category' => $category]);
	}

    public function store(CreateItemRequest $request)
    {
    	$item = new Item;
    	$item->fill($request->only('description', 'category_id'));
    	$item->save();

    	$category = Category::find($item->category_id);

    	session()->flash('message', '¡Se ha agregado el item!');
    	// return dd($request);    	
    	return redirect()->route('categories.edit', ['category' => $category->id]);
    }

    public function edit(Item $item)
    {
        return view('items.edit')->with(['item' => $item]);

        // $items = Item::where('category_id', $category->id)->get();
        // $items = $category->items->reverse();
        // return view('categories.edit')->with(['category' => $category, 'items' => $items]);     
    }

    public function getItemsByBudget(Budget $budget)
    {        
        $items = DB::table('items')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->where('categories.budget_id', '=', $budget->id)
            ->select('items.*')
            ->get();
        return $items;
    }
}
