<?php
// functions.php

use HostBill;

function createLetsEncryptSSL($params) {
    // Fetch API keys securely from the HostBill configuration
    $hetznerCloudAPIKey = HostBill\Config::get('hetzner_cloud_api_key');
    $hetznerDNSAPIKey = HostBill\Config::get('hetzner_dns_api_key');
    
    // If API keys are missing, return an error
    if (empty($hetznerCloudAPIKey) || empty($hetznerDNSAPIKey)) {
        return $_LANG['apiKeyError'];
    }

    $hetznerCloud = new HetznerCloud($hetznerCloudAPIKey);
    $hetznerDNS = new HetznerDNS($hetznerDNSAPIKey);
    $letsEncrypt = new LetsEncrypt($params['domain'], $params['email']);

    // Add DNS TXT record for validation
    $txtRecord = $hetznerDNS->addTXTRecord($params['domain'], $params['validation_value']);
    
    if ($txtRecord) {
        // Issue SSL certificate
        return $_LANG['sslIssued'];
    } else {
        return $_LANG['txtRecordFailure'];
    }
}
