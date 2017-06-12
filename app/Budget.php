<?php

namespace Budgets;

use Budgets\User;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
	protected $table = 'budgets';

    protected $casts = ['user_id' => 'integer'];

    protected $fillable = ['name', 'description'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
