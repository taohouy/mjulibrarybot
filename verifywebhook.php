<?php
$access_token = "EAAFiLqqrKJcBAOqZAUh0uZCMmzxYTvZCKSlqPtg43hNqQx12IO4cl4j8ZBCs4jDjqRPvA2FVvu5CeCuuF2oMRgMcMLgOrlNSY3VnCl5elezT3k5W4MZCozSP4k7AdZAb33sKqjeDDY4eYcyKoDeR2siMl7nZAoV5HatvZA5umxFXfgZDZD";
$verify_token = "mjulibrarybot";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
    $challenge = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
    echo $challenge;
}
