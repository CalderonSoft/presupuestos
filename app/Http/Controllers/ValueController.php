<?php

namespace Budgets\Http\Controllers;

use Budgets\Item;
use Budgets\Budget;
use Budgets\Value;
use Budgets\Http\Requests\InsertRealValueRequest;
use Budgets\Http\Requests\InsertPlannedValueRequest;
use Illuminate\Http\Request;

class ValueController extends Controller
{

    public function create(Item $item)
    {
        $category = $item->category;
        return view('values.insertReal')->with(['item' => $item, 'category' => $category]);
    }

    public function storeReal(InsertRealValueRequest $request)
    {
        $value = new Value;
        $value->amount = $request->get('amount');
        $value->description = $request->get('description');
        $value->date = date('Y-m-d');
        $value->class = "real";
        $value->item_id = $request->get('item_id');
        $value->save();

        $item = Item::find($value->item_id);
        $category = $item->category;
        $budget = $category->budget;
        return redirect()->route('reports_history', ['budget' => $budget->id]);
    }

    public function update(InsertPlannedValueRequest $request)
    {
    	$year = $request->get('budgetYear');

        if ($request->get('sameValue')) {
            // Enero
        $value_ene = Value::find($request->get('ene_id'));
        $value_ene->amount = $request->get('ene');
        $value_ene->save();
        // Febrero
        $value_feb = Value::find($request->get('feb_id'));
        $value_feb->amount = $request->get('ene');
        $value_feb->save();
        // Marzo
        $value_mar = Value::find($request->get('mar_id'));
        $value_mar->amount = $request->get('ene');
        $value_mar->save();
        // Abril
        $value_abr = Value::find($request->get('abr_id'));
        $value_abr->amount = $request->get('ene');
        $value_abr->save();
        // Mayo
        $value_may = Value::find($request->get('may_id'));
        $value_may->amount = $request->get('ene');
        $value_may->save();
        // Junio
        $value_jun = Value::find($request->get('jun_id'));
        $value_jun->amount = $request->get('ene');
        $value_jun->save();
        // Julio
        $value_jul = Value::find($request->get('jul_id'));
        $value_jul->amount = $request->get('ene');
        $value_jul->save();
        // Agosto
        $value_ago = Value::find($request->get('ago_id'));
        $value_ago->amount = $request->get('ene');
        $value_ago->save();
        // Septiembre
        $value_sep = Value::find($request->get('sep_id'));
        $value_sep->amount = $request->get('ene');
        $value_sep->save();
        // Octubre
        $value_oct = Value::find($request->get('oct_id'));
        $value_oct->amount = $request->get('ene');
        $value_oct->save();
        // Noviembre
        $value_nov = Value::find($request->get('nov_id'));
        $value_nov->amount = $request->get('ene');
        $value_nov->save();
        // Diciembre
        $value_dic = Value::find($request->get('dic_id'));
        $value_dic->amount = $request->get('ene');
        $value_dic->save();
        }
        else{
            // Enero
        $value_ene = Value::find($request->get('ene_id'));
        $value_ene->amount = $request->get('ene');
        $value_ene->save();
        // Febrero
        $value_feb = Value::find($request->get('feb_id'));
        $value_feb->amount = $request->get('feb');
        $value_feb->save();
        // Marzo
        $value_mar = Value::find($request->get('mar_id'));
        $value_mar->amount = $request->get('mar');
        $value_mar->save();
        // Abril
        $value_abr = Value::find($request->get('abr_id'));
        $value_abr->amount = $request->get('abr');
        $value_abr->save();
        // Mayo
        $value_may = Value::find($request->get('may_id'));
        $value_may->amount = $request->get('may');
        $value_may->save();
        // Junio
        $value_jun = Value::find($request->get('jun_id'));
        $value_jun->amount = $request->get('jun');
        $value_jun->save();
        // Julio
        $value_jul = Value::find($request->get('jul_id'));
        $value_jul->amount = $request->get('jul');
        $value_jul->save();
        // Agosto
        $value_ago = Value::find($request->get('ago_id'));
        $value_ago->amount = $request->get('ago');
        $value_ago->save();
        // Septiembre
        $value_sep = Value::find($request->get('sep_id'));
        $value_sep->amount = $request->get('sep');
        $value_sep->save();
        // Octubre
        $value_oct = Value::find($request->get('oct_id'));
        $value_oct->amount = $request->get('oct');
        $value_oct->save();
        // Noviembre
        $value_nov = Value::find($request->get('nov_id'));
        $value_nov->amount = $request->get('nov');
        $value_nov->save();
        // Diciembre
        $value_dic = Value::find($request->get('dic_id'));
        $value_dic->amount = $request->get('dic');
        $value_dic->save();
        }        

        $budget = Budget::find($request->get('budget_id'));
        return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);;

    }

    public function store(InsertPlannedValueRequest $request)
    {
    	$year = $request->get('year');    

        if ($request->get('sameValue')) {
            for ($i=1; $i < 13 ; $i++) { 
                $value = new Value;
                $value->amount = $request->get('ene');
                $value->date = $year.'-'.$i.'-01';
                $value->class = "planned";
                $value->item_id = $request->get('item_id');
                $value->save();
            }
        } else {
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
        }    	

        $budget = Budget::find($request->get('budget_id'));
    	return redirect()->route('budgets_show', ['budget' => $budget->id, 'year' => $year]);;
    }
}
