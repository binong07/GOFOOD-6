<?php

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("curl.php");
echo "\n";
echo "\e[93m             Perai Juo Lai Bangke!!             \n";
echo "\e[91m FORMAT NOMOR HP : INDONESIA '62***' , US='1***'\n";
echo "\e[93m SCRIPT GOJEK AUTO REGISTER + AUTO CLAIM VOUCHER   HARAM\n";
echo "\e[91m UNTUK RAKYAT MISKIN XD\n";
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
        sleep(8);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[!]".$voucher."\n";
            sleep(8);
            echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI11 !\n";
            sleep(8);
            goto next;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(8);
                echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI08 !\n";
                sleep(8);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(8);
                echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI19 !\n";
                sleep(8);
                goto next1;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(8);
                echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI08 !\n";
                sleep(8);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(8);
                echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI08 !\n";
                sleep(8);
                goto ride;
            }
          else
            {
            echo "\e[92m[+] ".$claim . "\n";
            sleep(8);
            echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI08 !\n";
            sleep(8);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(8);
                echo "\e[93m[!] Trying to redeem Voucher : AYOCOBAGOJEK !\n";
                sleep(8);

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
