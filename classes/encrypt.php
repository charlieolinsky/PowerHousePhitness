<!-- Symmetrical Key Encryption Test -->

<?php 

    $msg = "temp";
    $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

    $cipher = sodium_crypto_secretbox($msg, $key, $nonce);

    echo base64_encode($cipher); 

?>