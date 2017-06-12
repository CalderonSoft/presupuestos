<?php

namespace Budgets\Http\Controllers;

use Illuminate\Http\Request;
use Budgets\Budget;

class BudgetController extends Controller
{
    public function create()
	{
		$budget = new Budget;
		return view('budgets.create');
		// return view('budgets.create');
	}

	public function index()
    {
    	$budgets = Budget::orderBy('id', 'DESC')->paginate(10);
    	return view('budgets.index', compact('budgets'));
    }

    public function delete(Budget $budget)
    {
    	
    	
    	$budget->delete();

    	return redirect()->route('budgets.index');

    	// return back()->with('info', 'El presupuesto ' . $id . ' fue eliminado');
    	
    }
    

}
