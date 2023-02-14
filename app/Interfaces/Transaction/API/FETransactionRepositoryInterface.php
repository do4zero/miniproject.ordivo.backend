<?php

namespace App\Interfaces\Transaction\API;

interface FETransactionRepositoryInterface
{
    public function list($searchTerm, array $conditions);
    public function listOrder($sessionid);
    public function create(array $transactionData);
    public function trxDetail($invoicenumber);
}
