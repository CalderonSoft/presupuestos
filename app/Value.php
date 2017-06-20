<?php

namespace Budgets;

use DB;
use Budgets\Item;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
  protected $casts = ['item_id' => 'integer'];

  protected $fillable = ['amount', 'date', 'class', 'description', 'item_id'];

  public function item()
  {
    return $this->belongsTo(Item::class);
  }

  public function getValuesByBudget(Budget $budget, int $year)
    {
        $values = DB::table('values')
        	->join('items', 'item_id', '=', 'items.id')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->where('categories.budget_id', '=', $budget->id)
            ->whereYear('values.date', $year)
            ->select('values.*')
            ->get();
        return $values;
    }

}
