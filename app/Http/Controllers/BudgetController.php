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
    	$budget = Budget::orderBy('id', 'DESC')->paginate();
    	return view('budgets.index', compact('budget'));
    }

}
