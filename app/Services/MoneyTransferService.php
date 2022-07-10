<?php

namespace App\Services;

use App\Repositories\BalancesRepository;
use App\Repositories\BalanceLogRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class MoneyTransferService
{
    private $balancesRepository;
    private $balanceLogRepository;

    const CREDIT = 0;
    const DEBIT = 1;

    public function __construct(
        BalancesRepository $balancesRepository,
        BalanceLogRepository $balanceLogRepository
    ) {
        $this->balancesRepository = $balancesRepository;
        $this->balanceLogRepository = $balanceLogRepository;
    }

    public function handle(int $senderUserId, int $recipientUserId, int $amount): bool
    {
        try {
            DB::beginTransaction();
            $this->balancesRepository->transferHandle($senderUserId, $amount);
            $this->balancesRepository->receiveHandle($recipientUserId, $amount);
            $this->balanceLogRepository->saveRecord($this->saveRecordData($senderUserId, $recipientUserId, $amount));

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    private function saveRecordData($senderUserId, $recipientUserId, $amount): array
    {
        $now = now();
        return [
            [
                'user_id' => $senderUserId,
                'transaction_type' => self::CREDIT,
                'amount' => $amount,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'user_id' => $recipientUserId,
                'transaction_type' => self::DEBIT,
                'amount' => $amount,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];
    }
}
