<?php

namespace Budgets;

use DB;
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

    public function getButgetsWithUser()
    {
        $budgets = DB::table('budgets')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('budgets.*', 'users.name as user') 
            ->orderBy('id', 'desc')           
            ->paginate(10);
        return $budgets;
    }
}
