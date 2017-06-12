<?php

namespace Budgets\Http\Controllers;

use Illuminate\Http\Request;
use Budgets\Budget;

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

}
