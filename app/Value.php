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
          ->where('values.class', '=', 'planned')
          ->whereYear('values.date', $year)
          ->select('values.*')
          ->get();
      return $values;
  }

  public function getValuesByItem(Item $item, int $year)
    {
        $values = DB::table('values')
            ->where('values.item_id', '=', $item->id)
            ->where('values.class', '=', 'planned')
            ->whereYear('values.date', $year)
            ->select('values.*')
            ->get();
        return $values;
    }

    public function getRealValuesByBudget(Budget $budget)
    {
      $values = DB::table('values')
        ->join('items', 'item_id', '=', 'items.id')
          ->join('categories', 'category_id', '=', 'categories.id')
          ->where('categories.budget_id', '=', $budget->id)
          ->where('values.class', '=', 'real')
          ->select('values.*', 'categories.name as category', 'items.description as item', 'categories.class as category_class')
          ->orderBy('values.date', 'desc')
          ->get();
      return $values;
    }

    public function getValuesPlannedByYear(Budget $budget, int $year)
    {
      $values = DB::table('values')
        ->join('items', 'item_id', '=', 'items.id')
          ->join('categories', 'category_id', '=', 'categories.id')
          ->where('categories.budget_id', '=', $budget->id)
          ->where('values.class', '=', 'planned')
          ->whereYear('values.date', $year)
          ->select('items.id as item_id', DB::raw('SUM(values.amount) as planned_value'))
          ->groupBy('items.id')
          ->get();
      return $values;
    }

    public function getValuesRealByYear(Budget $budget, int $year)
    {
      $values = DB::table('values')
        ->join('items', 'item_id', '=', 'items.id')
          ->join('categories', 'category_id', '=', 'categories.id')
          ->where('categories.budget_id', '=', $budget->id)
          ->where('values.class', '=', 'real')
          ->whereYear('values.date', $year)
          ->select('items.id as item_id', DB::raw('SUM(values.amount) as real_value'))
          ->groupBy('items.id')
          ->get();
      return $values;
    }

    public function getValuesPlannedByMonth(Budget $budget, int $year, int $month)
    {
      $values = DB::table('values')
        ->join('items', 'item_id', '=', 'items.id')
          ->join('categories', 'category_id', '=', 'categories.id')
          ->where('categories.budget_id', '=', $budget->id)
          ->where('values.class', '=', 'planned')
          ->whereYear('values.date', $year)
          ->whereMonth('values.date', $month)
          // ->sum('values.amount')
          ->select('items.id as item_id', DB::raw('SUM(values.amount) as planned_value'))
          ->groupBy('items.id')
          ->get();
      return $values;
    }

    public function getValuesRealByMonth(Budget $budget, int $year, int $month)
    {
      $values = DB::table('values')
        ->join('items', 'item_id', '=', 'items.id')
          ->join('categories', 'category_id', '=', 'categories.id')
          ->where('categories.budget_id', '=', $budget->id)
          ->where('values.class', '=', 'real')
          ->whereYear('values.date', $year)
          ->whereMonth('values.date', $month)
          // ->sum('values.amount')
          ->select('items.id as item_id', DB::raw('SUM(values.amount) as real_value'))
          ->groupBy('items.id')
          ->get();
      return $values;
    }

}
