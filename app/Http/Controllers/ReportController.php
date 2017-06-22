<?php

namespace Budgets\Http\Controllers;

use Budgets\Budget;
use Budgets\Value;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
    	$user = \Auth::user();
        $budgets = $user->budgets->reverse();
		return view('reports.indexHistory', compact('budgets'));
    }

    public function history(Budget $budget)
    {
    	$value = new Value;
    	$values = $value->getRealValuesByBudget($budget);
    	return view('reports.history', compact('values', 'budget'));
    }
}
