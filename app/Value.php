<?php

namespace Budgets;

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
}
