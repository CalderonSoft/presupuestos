<?php

namespace Budgets\Http\Controllers;

use Budgets\Budget;
use Budgets\Value;
use Budgets\Http\Requests\InsertPlannedValueRequest;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function update(InsertPlannedValueRequest $request)
    {
    	$year = $request->get('year');
        return $year;

        $budget = Budget::find($request->get('budget_id'));
        // return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);;

    }

    public function store(InsertPlannedValueRequest $request)
    {
    	$year = $request->get('year');        
    	// Enero
    	$value_ene = new Value;
    	$value_ene->amount = $request->get('ene');
    	$value_ene->date = $year.'-01-01';
    	$value_ene->class = "planned";
    	$value_ene->item_id = $request->get('item_id');
    	$value_ene->save();
    	// Febrero
    	$value_feb = new Value;
    	$value_feb->amount = $request->get('feb');
    	$value_feb->date = $year.'-02-01';    	
    	$value_feb->class = "planned";
    	$value_feb->item_id = $request->get('item_id');
    	$value_feb->save();
		// Marzo
    	$value_mar = new Value;
    	$value_mar->amount = $request->get('mar');
    	$value_mar->date = $year.'-03-01';    	
    	$value_mar->class = "planned";
    	$value_mar->item_id = $request->get('item_id');
    	$value_mar->save();
		// Abril
    	$value_abr = new Value;
    	$value_abr->amount = $request->get('abr');
    	$value_abr->date = $year.'-04-01';    	
    	$value_abr->class = "planned";
    	$value_abr->item_id = $request->get('item_id');
    	$value_abr->save();
		// Mayo
    	$value_may = new Value;
    	$value_may->amount = $request->get('may');
    	$value_may->date = $year.'-05-01';    	
    	$value_may->class = "planned";
    	$value_may->item_id = $request->get('item_id');
    	$value_may->save();
		// Junio
    	$value_jun = new Value;
    	$value_jun->amount = $request->get('jun');
    	$value_jun->date = $year.'-06-01';    	
    	$value_jun->class = "planned";
    	$value_jun->item_id = $request->get('item_id');
    	$value_jun->save();
		// Julio
    	$value_jul = new Value;
    	$value_jul->amount = $request->get('jul');
    	$value_jul->date = $year.'-07-01';    	
    	$value_jul->class = "planned";
    	$value_jul->item_id = $request->get('item_id');
    	$value_jul->save();
		// Agosto
    	$value_ago = new Value;
    	$value_ago->amount = $request->get('ago');
    	$value_ago->date = $year.'-08-01';    	
    	$value_ago->class = "planned";
    	$value_ago->item_id = $request->get('item_id');
    	$value_ago->save();
		// Septiempre
    	$value_sep = new Value;
    	$value_sep->amount = $request->get('sep');
    	$value_sep->date = $year.'-09-01';    	
    	$value_sep->class = "planned";
    	$value_sep->item_id = $request->get('item_id');
    	$value_sep->save();
		// Octubre
    	$value_oct = new Value;
    	$value_oct->amount = $request->get('oct');
    	$value_oct->date = $year.'-10-01';    	
    	$value_oct->class = "planned";
    	$value_oct->item_id = $request->get('item_id');
    	$value_oct->save();
		// Noviembre
    	$value_nov = new Value;
    	$value_nov->amount = $request->get('nov');
    	$value_nov->date = $year.'-11-01';    	
    	$value_nov->class = "planned";
    	$value_nov->item_id = $request->get('item_id');
    	$value_nov->save();
		// Diciembre
    	$value_dic = new Value;
    	$value_dic->amount = $request->get('dic');
    	$value_dic->date = $year.'-12-01';    	
    	$value_dic->class = "planned";
    	$value_dic->item_id = $request->get('item_id');
    	$value_dic->save();

        $budget = Budget::find($request->get('budget_id'));
    	return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);;
    }
}
