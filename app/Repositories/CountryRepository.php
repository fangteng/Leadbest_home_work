<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Country;

class CountryRepository
{
    public function getCountryList()
    {
        return Country::get();
    }
}
