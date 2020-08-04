<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    //Un exoense report tiene muchos gastos
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
