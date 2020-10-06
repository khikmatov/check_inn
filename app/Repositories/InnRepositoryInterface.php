<?php

namespace App\Repositories;

use App\Models\Inn;
use Carbon\Carbon;

interface InnRepositoryInterface
{
    public function findByInnAndCheckingDate(string $inn, Carbon $date): ?Inn;

    public function create(string $inn, Carbon $date, bool $isSelfEmployed, bool $status, ?string $code, ?string $message): Inn;
}
