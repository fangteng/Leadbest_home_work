<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Balances;

class BalancesRepository
{
    public function transferHandle(int $senderUserId, int $amount): bool
    {
       return DB::update("update student set balance = balance - '$amount' where user_id = '$senderUserId'");
    }

    public function receiveHandle(int $senderUserId, int $amount): bool
    {
        return DB::update("update student set balance = balance + '$amount' where user_id = '$senderUserId'");
    }
}
