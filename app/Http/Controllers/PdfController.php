<?php

namespace Budgets\Http\Controllers;

use Budgets\Budget;
use Budgets\Value;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    
    public function history(Budget $budget)
    {
    	$value = new Value;
    	$values = $value->getRealValuesByBudget($budget);
    	// return view('reports.history', compact('values', 'budget'));
    	$view = \View::make('pdf.history', compact('values', 'budget'))->render();

    	// $pdf = \PDF::loadView('reports.history', compact('values', 'budget'));
    	$pdf = \PDF::loadHTML($view);
    	return $pdf->setPaper('a4', 'landscape')->stream('History_Report.pdf');
    }
}
