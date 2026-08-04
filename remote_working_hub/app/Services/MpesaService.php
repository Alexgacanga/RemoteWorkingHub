<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as Http;

class MpesaService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function registerUrls(){
        return Http::withBasicAuth(
            config('mpesa.customer'),
            config('mpesa.secret')
        )
        ->post(
            'https://sandbox.safaricom.co.ke/mpesa/c2b/v2/registerurl',
            [
                "ShortCode" => config('mpesa.shortcode'),
                "ResponseType" => 'Completed',
                "ConfirmationURL" => config('mpesa.confirmation_url'),
                "ValidationURL" => config('mpesa.validation_url')
            ]
        );
    }
    public function validate(Request $request){

        return([
            'ResultCode' => '0',
            'ResultDesc' => 'Accepted'
        ]);
    }
    public function parseConfirmation(Request $request): array{
        return([
            'transaction_id' => $request->input('TransID'),
            'transaction_time' => $request->input('TransTime'),
            'transaction_amount' => $request->input('TransAmount'),
            'phone_number' => $request->input('MSISDN'),
            'fname' => $request->input('FirstName'),
        ]);
    }
    public function confirmation(Request $request): array{
        return $this->parseConfirmation($request);
    }
}
