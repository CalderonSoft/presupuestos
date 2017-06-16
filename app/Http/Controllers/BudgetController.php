<?php

namespace Budgets\Http\Controllers;

use Budgets\Budget;
use Budgets\Category;
use Illuminate\Http\Request;
use Budgets\Http\Requests\CreateBudgetRequest;
use Budgets\Http\Requests\UpdateBudgetRequest;

class BudgetController extends Controller
{

	public function index()
    {
    	if (\Auth::user()) {
            // $budgets = Budget::with('user')->where('user_id', \Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
            $user = \Auth::user();
            $budgets = $user->budgets->reverse();
    		return view('budgets.index', compact('budgets'));
        } else {
            return view('welcome');
        }
    }

    public function show(Budget $budget, Request $request)
    {
    	// $categories = Category::with('budget')->where('budget_id', $budget->id)->get();
    	if ($request->get('budgetYear') != null) {
    		// return "Existe".$request->get('budgetYear');
    		$year = $request->get('budgetYear');
    	}else{
    		$year = date("Y");
    	}
    	$categories = $budget->categories;
    	$item = new ItemController;
    	$items = $item->getItemsByBudget($budget);
    	return view('budgets.show')->with(['budget' => $budget, 'categories' => $categories, 'items' => $items, 'year' => $year]);
    }

    public function create()
	{
		$budget = new Budget;
		return view('budgets.create', compact('budget'));
	}


	 public function edit(Budget $budget)
	{

        return view('budgets.edit', compact('budget'));
	}

	public function store(CreateBudgetRequest $request)
	{
		$budget = new Budget;
		$budget->fill($request->only('name', 'description'));
		$budget->user_id = auth()->user()->id;
		$budget->save();

		session()->flash('message', '¡Presupuesto creado!');
		return redirect()->route('budgets.index');

	}

	public function update(Budget $budget, UpdateBudgetRequest $request)
	{		
		$budget->update(
				$request->only('name', 'description'));
		session()->flash('message', '¡Presupuesto actualizado!');
		return redirect()->route('budgets.index');
	}

	public function destroy(Budget $budget)
    {
    	$budget->delete();

    	session()->flash('message', '¡El presupuesto se ha borrado!');
    	return redirect()->route('budgets.index');

    	// return back()->with('info', 'El presupuesto ' . $id . ' fue eliminado');
    }

}
