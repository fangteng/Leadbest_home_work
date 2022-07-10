<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\BalanceLog;

class BalanceLogRepository
{
    public function saveRecord(array $data): bool
    {
        return BalanceLog::insert($data);
    }
}
