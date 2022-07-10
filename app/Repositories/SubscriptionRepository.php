<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Subscription;

class SubscriptionRepository
{
    public function getByCountryId(int $countryId, string $now)
    {
        return Subscription::where('country_id', $countryId)->where('end_date', '<=', $now)->get();
    }

    public function update(array $memberId, array $data)
    {
        return Subscription::whereIn('memberId', $memberId)->update($data);
    }
}
