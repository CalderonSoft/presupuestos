<?php

namespace Budgets;

use DB;
use Budgets\Value;
use Budgets\Category;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $casts = ['$category_id' => 'integer'];

    protected $fillable = ['description', 'category_id'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function values()
    {
      return $this->hasMany(Value::class);
    }

    public function getItemsByBudget(Budget $budget)
    {
        $items = DB::table('items')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->where('categories.budget_id', '=', $budget->id)
            ->select('items.*')
            ->get();
        return $items;
    }
}
