<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceLog extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'balance_logs';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
