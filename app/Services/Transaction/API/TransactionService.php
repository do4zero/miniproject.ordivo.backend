<?php

namespace App\Services\Payment\API;

use App\Repositories\API\FETransactionRepository;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    private FETransactionRepository $transactionRepository;

    function __construct(FETransactionRepository $transactionRepository) {
        $this->transactionRepository = $transactionRepository;
    }

    public function create($params = array())
    {
        DB::beginTransaction();
        try {
            $paymentmethod = $this->transactionRepository->create($params);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return [
                'status' => false,
                'reason' => $th->getMessage(),
                'data' => null,
                'message' =>  $th->getMessage().'Transaction failed to '. (empty($id) ? ' create' : 'update')
            ];
        }

        return [
            'status' => true,
            'data' => $paymentmethod,
            'message' => 'Transaction successfully '. (empty($id) ?  ' created' : 'updated')
        ];
    }
}
