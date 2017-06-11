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
		// return view('budgets.create');
	}
}

