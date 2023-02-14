<?php

namespace App\Repositories\API;

use App\Interfaces\Transaction\API\FETransactionRepositoryInterface;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class FETransactionRepository implements FETransactionRepositoryInterface
{
    protected $transaction;
    protected $transactionDetail;

    function __construct(Transaction $transaction, TransactionDetail $transactionDetail) {
        $this->transaction = $transaction;
        $this->transactionDetail = $transactionDetail;
    }

    public function listOrder($sessionid)
    {
        return $this->transaction->where(['session_id' => $sessionid])->orderBy('created_at','DESC')->get();
    }

    public function create($transactionData)
    {
        return $this->transaction->create($transactionData);
    }

    public function createDetail($transactionData)
    {
        return $this->transactionDetail->insert($transactionData);
    }

    public function trxDetail($invoicenumber)
    {
        return $this->transaction
                    ->with(['shop','payment','items','items.product'])
                    ->where(['invoice_number' => $invoicenumber])->first();
    }
}
