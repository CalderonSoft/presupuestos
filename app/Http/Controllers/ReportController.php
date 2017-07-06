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
        if (\Auth::user()->role == 2) {
            $user = \Auth::user();
            $budgets = $user->budgets->reverse();
        } else {
            $budgets = Budget::with('user')->orderBy('name')->paginate(10);
        }  
        switch ($report) {
            case 1:
                return view('reports.indexHistory', compact('budgets'));
                break;

            case 2:
                return view('reports.indexPlannedExecuted', compact('budgets'));
                break;
            
            default:
            return back();
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
        $value = new Value;
        if ($month ==0) {
            $pValues = $value->getValuesPlannedByYear($budget, $year);
            $rValues = $value->getValuesRealByYear($budget, $year);
        } else {
            $pValues = $value->getValuesPlannedByMonth($budget, $year, $month);
            $rValues = $value->getValuesRealByMonth($budget, $year, $month);
        }

        return view('reports.plannedExecuted')->with(['budget' => $budget, 'categories' => $categories, 'items' => $items, 'year' => $year, 'month' => $month, 'pValues' => $pValues, 'rValues' => $rValues]);
    }

    public function setMonth(Request $request)
    {
        $budget = Budget::find($request->get('budget_id'));
        $year = $request->get('budgetYear');
        $month = $request->get('budgetMonth');
        return redirect()->route('reports_plannedExecuted', ['budget' => $budget->id, 'year' => $year, 'month' => $month]);
    }
}
