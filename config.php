<?php
// config.php

$moduleVersion = '1.0.0';
$moduleName = 'LetsEncryptSSL';
$moduleType = 'SSL';
$apiDocs = 'https://hostbill.atlassian.net/wiki/spaces/DOCS/pages/1213271/OpenSRS+SSL'; // OpenSRS API docs as a reference

// Fetch API keys securely from HostBill configuration
$hetznerCloudAPIKey = HostBill\Config::get('hetzner_cloud_api_key');
$hetznerDNSAPIKey = HostBill\Config::get('hetzner_dns_api_key');

// Ensure that the API keys are retrieved successfully
if (empty($hetznerCloudAPIKey) || empty($hetznerDNSAPIKey)) {
    die('API keys are not set. Please set HETZNER_CLOUD_API_KEY and HETZNER_DNS_API_KEY in the HostBill configuration.');
}
