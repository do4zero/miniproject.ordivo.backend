<?php

namespace App\Interfaces\Payment\API;

interface FETransactionRepositoryInterface
{
    public function create(array $transactionData);
}
