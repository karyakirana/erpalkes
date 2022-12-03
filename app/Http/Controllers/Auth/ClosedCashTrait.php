<?php namespace App\Http\Controllers\Auth;

use App\Models\ClosedCash;
use Carbon\Carbon;

trait ClosedCashTrait
{
    /**
     * Handle Closed Cashed after login to session
     * @param number $idUser ID USER
     * @return string Active Closed id
     */
    public function ClosedCash($idUser)
    {
        $data = ClosedCash::whereNull('closed')->latest()->first();
        if ($data) {
            // jika null maka buat data
            return $data->active_cash;
        }
        $generateClosedCash = md5(now());
        $isi = [
            'active_cash' => $generateClosedCash,
            'user_id' => $idUser,
            'started' => Carbon::now('Asia/Jakarta')
        ];
        $createData = ClosedCash::create($isi);
        return $generateClosedCash;

    }
}
