<?php

use Carbon\Carbon;

if (!function_exists('terbilang')){
    function terbilang($angka) {
        $angka=abs($angka);
        $baca =array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

        $terbilang="";
        if ($angka < 12){
            $terbilang= " " . $baca[$angka];
        }
        else if ($angka < 20){
            $terbilang= terbilang($angka - 10) . " belas";
        }
        else if ($angka < 100){
            $terbilang= terbilang($angka / 10) . " puluh" . terbilang($angka % 10);
        }
        else if ($angka < 200){
            $terbilang= " seratus" . terbilang($angka - 100);
        }
        else if ($angka < 1000){
            $terbilang= terbilang($angka / 100) . " ratus" . terbilang($angka % 100);
        }
        else if ($angka < 2000){
            $terbilang= " seribu" . terbilang($angka - 1000);
        }
        else if ($angka < 1000000){
            $terbilang= terbilang($angka / 1000) . " ribu" . terbilang($angka % 1000);
        }
        else if ($angka < 1000000000){
            $terbilang= terbilang($angka / 1000000) . " juta" . terbilang($angka % 1000000);
        }
        return $terbilang;
    }

}

if (!function_exists('tanggalan_format')){
    function tanggalan_format($tanggal): ?string
    {
        return Carbon::parse($tanggal)->format('d-M-Y') ?? null;
    }
}


if (!function_exists('tanggalan_database_format')){
    /** @noinspection PhpFunctionNamingConventionInspection */
    function tanggalan_database_format($tanggal, $format): ?string
    {
        return Carbon::createFromFormat($format, $tanggal)->format('Y-m-d') ?? null;
    }
}

if (!function_exists('rupiah_format')){
    function rupiah_format($number): ?string
    {
        return number_format($number, 0, ",", ".") ?? null;
    }
}
