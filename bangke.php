<?php

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("curl.php");
echo "\n";
echo "\e[93m             Perai Juo Lai Bangke!!             \n";
echo "\e[91m AGIAH ANGKO 1 DI AWAL MA ISI NOMOR E ABANG2. \n";
echo "\e[93m Khusus Pecinta Perai Kayak Tonok\n";
echo "\e[91m Inspired by TONOK \n";
echo "\n";
echo "\e[96m[?] Nomor HP Ang Anjing (62/1) : ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[91m[x] Nomor Alah Terdaftar \n";
    }
  else
    {
    otp:
    echo "\e[96m[!] Masuk an Kode eee (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[91m[x] Kode Verifikasinyo Salah\n";
        goto otp;
        }
      else
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI19 !\n";
        sleep(30);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[!]".$voucher."\n";
            sleep(5);
            echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI11 !\n";
            sleep(5);
            goto next;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(5);
                echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
                sleep(5);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(5);
                echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI19 !\n";
                sleep(5);
                goto next1;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(5);
                echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
                sleep(5);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(5);
                echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
                sleep(5);
                goto ride;
            }
          else
            {
            echo "\e[92m[+] ".$claim . "\n";
            sleep(5);
            echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";
            sleep(5);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(5);
                echo "\e[93m[!] Trying to redeem Voucher : AYOCOBAGOJEK !\n";
                sleep(5);

            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(8);
                echo "\e[93m[!] Trying to redeem Voucher : AYOCOBAGOJEK !\n";
                sleep(8);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
                echo "\033VOUCHER INVALID/GAGAL REDEEM\n";
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                
        }
    }
    }


?>
