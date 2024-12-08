<?php
// module.php

function letsEncryptSSL_configure($params) {
    // Configuration UI logic (e.g., domain, email, etc.)
    return ['template' => 'configure.tpl', 'params' => $params];
}

function letsEncryptSSL_create($params) {
    return createLetsEncryptSSL($params);
}

add_hook('clientarea', 1, 'letsEncryptSSL_configure');
add_hook('adminarea', 1, 'letsEncryptSSL_create');
