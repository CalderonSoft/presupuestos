<?php

namespace Budgets\Http\Controllers;

use Budgets\Budget;
use Illuminate\Http\Request;
use Budgets\Http\Requests\CreateBudgetRequest;

class BudgetController extends Controller
{
    
	public function index()
    {
    	if (\Auth::user()) {
            $budgets = Budget::orderBy('id', 'DESC')->paginate(10);
    		return view('budgets.index', compact('budgets'));
        } else {
            return view('welcome');
        }     	
    }

    public function create()
	{
		$budget = new Budget;
		return view('budgets.create', compact('budget'));
		// return view('budgets.create');
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

	public function destroy(Budget $budget)
    {    	
    	$budget->delete();

    	session()->flash('message', '¡El presupuesto se ha borrado!');
    	return redirect()->route('budgets.index');

    	// return back()->with('info', 'El presupuesto ' . $id . ' fue eliminado');    	
    }
    



}
