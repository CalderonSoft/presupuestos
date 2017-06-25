<?php

namespace Budgets\Http\Controllers;

use Budgets\Item;
use Budgets\Budget;
use Budgets\Value;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(int $report)
    {

        $user = \Auth::user();
        $budgets = $user->budgets->reverse();
        switch ($report) {
            case 1:
                return view('reports.indexHistory', compact('budgets'));
                break;

            case 2:
                return view('reports.indexPlannedExecuted', compact('budgets'));
                break;
            
            default:
                # code...
                break;
        }
    }

    public function history(Budget $budget)
    {
    	$value = new Value;
    	$values = $value->getRealValuesByBudget($budget);
    	return view('reports.history', compact('values', 'budget'));
    }

    public function plannedExecuted(Budget $budget, int $year, int $month)
    {
        $categories = $budget->categories;
        $item = new Item;
        $items = $item->getItemsByBudget($budget);
        // $value = new Value;
        // $values = $value->getValuesByBudget($budget, $year);
        return view('reports.plannedExecuted')->with(['budget' => $budget, 'categories' => $categories, 'items' => $items, 'year' => $year, 'month' => $month]);
    }

    public function setMonth(Request $request)
    {
        $budget = Budget::find($request->get('budget_id'));
        $year = $request->get('budgetYear');
        $month = $request->get('budgetMonth');
        return redirect()->route('reports_plannedExecuted', ['budget' => $budget->id, 'year' => $year, 'month' => $month]);
    }
}
