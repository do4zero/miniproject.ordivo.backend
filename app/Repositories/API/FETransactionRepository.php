<?php

namespace App\Repositories\API;

use App\Interfaces\Payment\API\FETransactionRepositoryInterface;
use App\Models\Transaction;

class FETransactionRepository implements FETransactionRepositoryInterface
{
    protected $transaction;

    function __construct(Transaction $transaction) {
        $this->transaction = $transaction;
    }

    public function create($transactionData)
    {
        return $this->transaction->create($transactionData);
    }
}
