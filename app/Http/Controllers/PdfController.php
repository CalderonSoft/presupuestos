<?php

namespace Budgets\Http\Controllers;

use Budgets\Item;
use Budgets\Budget;
use Budgets\Value;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    
    public function history(Budget $budget)
    {
    	$value = new Value;
    	$values = $value->getRealValuesByBudget($budget);

    	$view = \View::make('pdf.history', compact('values', 'budget'))->render();
    	$pdf = \PDF::loadHTML($view);
    	return $pdf->setPaper('legal', 'landscape')->stream('History_Report.pdf');
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

        $view = \View::make('pdf.plannedExecuted', compact('budget', 'categories', 'items', 'pValues', 'rValues', 'year', 'month'))->render();
        $pdf = \PDF::loadHTML($view);
        return $pdf->setPaper('legal', 'landscape')->stream('PlannedExecuted_Report.pdf');
    }

    public function budget(Budget $budget, int $year)
    {
        $categories = $budget->categories;
        $item = new Item;
        $items = $item->getItemsByBudget($budget);
        $value = new Value;
        $values = $value->getValuesByBudget($budget, $year);

        $view = \View::make('pdf.plannedBudget', compact('budget', 'categories', 'items', 'values', 'year'))->render();
        $pdf = \PDF::loadHTML($view);
        return $pdf->setPaper('legal', 'landscape')->stream('Planned_Budget.pdf');

        // return view('budgets.show')->with(['budget' => $budget, 'categories' => $categories, 'items' => $items, 'values' => $values, 'year' => $year]);
    }
}
