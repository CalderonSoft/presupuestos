<?php

namespace Budgets\Http\Controllers;

use Illuminate\Http\Request;
use Budgets\Budget;

class BudgetController extends Controller
{
    public function create()
	{
		$budget = new Budget;
		return view('budgets.create')->with(['budget' => $budget]);
	}

	public function index()
    {
    	$budget = Budget::orderBy('id', 'DESC')->paginate();
    	return view('budgets.index', compact('budget'));
    }

}

