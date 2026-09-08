<?php

use App\Models\Datadiri;

if (!function_exists('IsApplyProfileComplete')) {
    /**
     * Domisili (provinces/cities) and instansi kampus (asal_instansi) must be
     * filled before a user is allowed to apply to a vacancy.
     */
    function IsApplyProfileComplete($user): bool
    {
        if (empty($user->asal_instansi)) {
            return false;
        }

        $datadiri = Datadiri::where('user_id', $user->id)->first();

        if (!$datadiri) {
            return false;
        }

        $isFilled = fn ($value) => !empty($value) && $value !== '-';

        return $isFilled($datadiri->provinces) && $isFilled($datadiri->cities);
    }
}
