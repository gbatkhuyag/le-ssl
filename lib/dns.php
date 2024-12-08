<?php
// lib/HetznerDNS.php

class HetznerDNS {
    private $apiKey;
    private $apiUrl = 'https://dns.hetzner.com/api/v1/';

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function addTXTRecord($domain, $value) {
        $url = $this->apiUrl . 'zones/' . $domain . '/records';
        $headers = ['Authorization: Bearer ' . $this->apiKey, 'Content-Type: application/json'];
        $data = json_encode(['type' => 'TXT', 'name' => '_acme-challenge', 'value' => $value]);

        return $this->apiRequest($url, $headers, $data);
    }

    private function apiRequest($url, $headers, $data = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if ($data) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}
