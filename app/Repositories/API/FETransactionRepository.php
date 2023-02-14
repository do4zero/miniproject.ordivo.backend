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

    public function list($searchTerm, $conditions = array())
    {
        $order = $this->transaction;

        if(!empty($searchTerm)){
            $order = $order->where('invoice_number', '%'.$searchTerm.'%');
        }

        $order = $order
                    ->where($conditions)
                    ->orderBy('created_at','DESC');
        return $order->paginate(10);
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
