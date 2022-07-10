<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MoneyTransferService;

class UserBalance extends Controller
{
    private $moneyTransferService;

    public function __construct(
        MoneyTransferService $moneyTransferService
    )
    {
        $this->moneyTransferService = $moneyTransferService;
    }

    /**
     * @param Number $senderUserId 匯款者
     * @param Number $recipientUserId 接受匯款者
     * @param Number $amount 轉帳
     * 
     * 參數驗證的部分就skip了
     */
    public function moneyTransfer(Request $request): bool
    {
        $senderUserId = 1;  
        $recipientUserId = 2; 
        $amount = 50;

        $responce = $this->moneyTransferService->handle($senderUserId, $recipientUserId, $amount); //轉帳處理

        if($responce) {
            return true;
        }

        return false;
    }
}
