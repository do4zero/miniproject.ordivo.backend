<?php

namespace App\Http\Controllers\API\Products;

use App\Http\Controllers\ApiController as BaseController;
use App\Libs\HttpStatusCode;
use App\Services\Products\API\FEGetAllProductsService;
use App\Services\Products\API\FEGetOneProductService;

class ProductController extends BaseController
{
    /**
     * Get All Product
     */
    public function getAllProduct($code, FEGetAllProductsService $products){
        $params = ['shop_code' => $code];

        $result = $products->display($params);

        $data = $result['data'];
        $pagination = $result['pagination'];
        $message = $result['message'];

        return $this
            ->setMeta($pagination)
            ->responseCode(HttpStatusCode::HTTP_200_OK)
            ->respond($data, $message);
    }

    /**
     * Get Single Product
     */
    public function getSingleProduct($code, $id, FEGetOneProductService $product){
        $result = $product->display(['shop_code' => $code, 'id' => $id]);

        $data = $result['data'];
        $message = $result['message'];

        return $this
            ->responseCode(HttpStatusCode::HTTP_200_OK)
            ->respond($data, $message);
    }
}
