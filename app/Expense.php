<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //los gastos pertenece a un reporte
    public function expenseReport()
    {
        return $this->belongsTo(ExpenseReport::class);
    }        
}
