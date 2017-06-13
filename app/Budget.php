<?php

namespace Budgets;

use Budgets\User;
use Budgets\Category;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $casts = ['user_id' => 'integer'];

    protected $fillable = ['name', 'description'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
