<?php

namespace App\Http\Controllers\API\Transaction;

use App\Http\Controllers\ApiController as BaseController;
use App\Http\Requests\API\PaymentMethod\CreatePaymentMethodRequest;
use App\Libs\HttpStatusCode;
use App\Services\Payment\API\PaymentMethodService;

class TransactionController extends BaseController
{
    /**
     * Create Payment Method
     */
    public function create(CreatePaymentMethodRequest $request, PaymentMethodService $payment_method){
        $result = $payment_method->create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'type' => $request->input('type'),
        ]);

        $data = $result['data'];
        $message = $result['message'];

        return $this
            ->responseCode(HttpStatusCode::HTTP_201_CREATED)
            ->respond($data, $message);
    }
}
