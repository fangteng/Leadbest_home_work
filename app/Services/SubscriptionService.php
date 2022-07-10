<?php

namespace App\Services;

use App\Repositories\SubscriptionRepository;
use App\Repositories\CountryRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class SubscriptionService
{
    private $subscriptionRepository;
    private $countryRepository;

    const SUBSCRIPTION_EXPIRE = [];

    public function __construct(
        SubscriptionRepository $subscriptionRepository,
        CountryRepository $countryRepository
    ) {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->countryRepository = $countryRepository;
    }

    public function processSubscription()
    {
        $serviceCountrys = $this->countryRepository->getCountryList();

        foreach ($serviceCountrys as $serviceCountry) {

            try {
                $subscriptionMembers = $this->subscriptionRepository->getByCountryId($serviceCountry->country_id, now($serviceCountry->timezone));
                $expireMemberId = [];
                foreach ($subscriptionMembers as $subscriptionMembers) {
                    $expireMemberId[] = $subscriptionMembers->member_id;
                }

                $this->subscriptionRepository->update($expireMemberId, ['status' => self::SUBSCRIPTION_EXPIRE, 'updated_at' => now($serviceCountry->timezone)]);
            } catch (Exception $e) {
                continue;
            }
        }
    }
}
