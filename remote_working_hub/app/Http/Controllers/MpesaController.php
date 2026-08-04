<?php

namespace App\Http\Controllers;

use App\Services\MpesaService;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    public function __construct(
        protected MpesaService $mpesaService,
        protected PaymentService $paymentService
    )
    {}
    public function validate(Request $request): JsonResponse{
        $response = $this->mpesaService->validate($request);
        return response()->json($response);
    }
    public function confirmation(Request $request): JsonResponse{
        $paymentData = $this->mpesaService->confirmation($request);
        $this->paymentService->processC2BPayment($paymentData);
        return response()->json([
            "ResponseCode" => "0",
            "ResponseDescription" => "Success"
        ]);
    }
    public function registerUrls(){
        
    }
}
