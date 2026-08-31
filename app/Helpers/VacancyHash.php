<?php

use Hashids\Hashids;

/**
 * Short, non-sequential-looking ids for public vacancy URLs (e.g. /vacancies/x7Qz9p).
 * Not meant as real access control (the vacancy page is public either way) —
 * just keeps raw incrementing PTK form ids out of shared links.
 */
function vacancyHashids(): Hashids
{
    static $instance = null;
    if ($instance === null) {
        $instance = new Hashids(config('app.key') . 'vacancy-id', 6);
    }
    return $instance;
}

function EncodeVacancyId($id): string
{
    return vacancyHashids()->encode((int) $id);
}

/**
 * @return int|null null if $hash isn't a valid vacancy hash
 */
function DecodeVacancyId($hash)
{
    $decoded = vacancyHashids()->decode($hash);
    return $decoded[0] ?? null;
}
