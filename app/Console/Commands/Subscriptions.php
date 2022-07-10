<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SubscriptionService;

class Subscriptions extends Command
{
    private $subscriptionService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新訂閱狀態';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        SubscriptionService $subscriptionService
    )
    {
        parent::__construct();

        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->subscriptionService->processSubscription();

        echo 'ok';
    }
}
