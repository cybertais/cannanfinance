<?php

class Hash{

   // Hash::create('sha256', 'passwordhere', 'SaltIfThereIsOne ');

/*
*
*   @param string $algo The alorithm (sha256, sha1, whirlpool, etc)
*   @param string $data The data to encode
*   @param string $salt The salt (This should be the same throughout the system probably)
*   @param string The hashed/salted data
*/

    public static function create($algo, $data,  $salt){
       $context = hash_init($algo, HASH_HMAC, $salt);
       hash_update($context, $data);
       return hash_final($context );
    }
}

?>