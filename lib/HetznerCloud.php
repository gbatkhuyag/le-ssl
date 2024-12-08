<?php
// lib/HetznerCloud.php

class HetznerCloud {
    private $apiKey;
    private $apiUrl = 'https://api.hetzner.cloud/v1/';

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function listServers() {
        $url = $this->apiUrl . 'servers';
        $headers = ['Authorization: Bearer ' . $this->apiKey];
        return $this->apiRequest($url, $headers);
    }

    private function apiRequest($url, $headers) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}
