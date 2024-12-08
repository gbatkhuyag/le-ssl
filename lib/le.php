<?php
// lib/LetsEncrypt.php

class LetsEncrypt {
    private $domain;
    private $email;

    public function __construct($domain, $email) {
        $this->domain = $domain;
        $this->email = $email;
    }

    public function issueCertificate() {
        // Issue a certificate using acme.sh or Certbot with dynamic domain and email
        $cmd = "/usr/bin/acme.sh --issue -d {$this->domain} --dns dns_hetzner --email {$this->email}";
        $output = shell_exec($cmd);
        return $output;
    }

    public function renewCertificate() {
        // Renew certificate if needed
        $cmd = "/usr/bin/acme.sh --renew -d {$this->domain}";
        $output = shell_exec($cmd);
        return $output;
    }
}
