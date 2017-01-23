<?php
$access_token = "EAAMpHeTlEBgBAJRnnmCiRf6OAMtrRNDwTaZB5Pn1Fhz9v4FtGnbXWJp7GZB2j8vl2ZBDsCwdptp4c4BIleFSZCKNLPxlPL5SdouY4ZC5LwCx1mhWN0t3tjidkBU7DVSw3r3ZBZA6fgRIRhAFxZCqRZCg72zs9a4r4t9NAL1UZAjie02wZDZD";
echo $verify_token = "mjulibrarybot";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
    $challenge = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
    echo $challenge;
}