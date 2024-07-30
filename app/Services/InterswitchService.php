<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class InterswitchService
{
    private const CLIENT_ID = 'gm7trJKt8IY7R6TNh1f5';
    private const CLIENT_SECRET = 'lr2J5rFTjDlYbG9wH69bLQJfFqg2uaKqrU9AIshy90NLoNLUoIzrvCqwPdNgFmaw';
    private const TERMINAL_ID = 'FOPUG00001';
    private const SIGNATURE_METHOD = 'sha256';
    private const SVA_BASE_URL = 'https://esb.interswitch.co.ke:19082/api/v1/merchant/';
    private const INQUIRY_URL = 'transactions/';

    public function transactionInquiry($transactionId)
    {
        $inquiryUrl = self::SVA_BASE_URL . self::INQUIRY_URL . $transactionId;
        $headers = $this->getAuthHeaders($inquiryUrl);
        
        $response = Http::withHeaders($headers)
                        ->get($inquiryUrl);

        return $response->body();
    }

    private function getAuthHeaders($resourceUrl)
    {
        $timestamp = $this->generateTimestamp();
        $nonce = $this->generateNonce();
        $signature = $this->generateSignature($resourceUrl, $timestamp, $nonce);

        return [
            'Authorization' => 'InterswitchAuth ' . base64_encode(self::CLIENT_ID),
            'Timestamp' => $timestamp,
            'Nonce' => $nonce,
            'Signature' => $signature,
            'SignatureMethod' => self::SIGNATURE_METHOD,
            'TerminalId' => self::TERMINAL_ID,
            'Content-Type' => 'application/json'
        ];
    }

    private function generateSignature($resourceUrl, $timestamp, $nonce)
    {
        $encodedUrl = urlencode($resourceUrl);
        $signatureCipher = "GET&$encodedUrl&$timestamp&$nonce&" . self::CLIENT_ID . '&' . self::CLIENT_SECRET;

        $signature = base64_encode(hash('sha256', $signatureCipher, true));

        return $signature;
    }

    private function generateNonce()
    {
        return sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535),
            mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535),
            mt_rand(0, 65535), mt_rand(0, 65535));
    }

    private function generateTimestamp()
    {
        $date = new \DateTime('now', new \DateTimeZone('Africa/Lagos'));
        return $date->getTimestamp();
    }
}
