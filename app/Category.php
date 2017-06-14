<?php

namespace Budgets;

use Budgets\Budget;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $casts = ['budget_id' => 'integer'];

    protected $fillable = ['name', 'class', 'budget_id'];

    public function budget()
    {
    	return $this->belongsTo(Budget::class);
    }

    public function items()
    {
    	return $this->hasMany(Item::class);
    }
}
