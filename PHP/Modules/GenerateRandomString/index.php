<?php
/*
For generating random string in php we will use 2 methods.
1) bin2hex();
2) random_bytes(); 

i)  bin2hex() Converts binary data into hexadecimal representation.
ii) random_bytes() Generates cryptographically secure pseudo-random bytes.
    random_bytes() takes 1 argument of length that is your random character string's length.  
 */
$randomString = bin2hex(random_bytes(4));
echo $randomString;
?>