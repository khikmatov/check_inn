<?php

namespace App\Repositories;

use App\Models\Inn;
use Carbon\Carbon;

class InnRepository implements InnRepositoryInterface
{
    /**
     * @param string $inn
     * @param Carbon $date
     * @return Inn|null
     */
    public function findByInnAndCheckingDate(string $inn, Carbon $date): ?Inn
    {
        return Inn::query()
            ->where('inn', $inn)
            ->where('checkingDate', $date->format('Y-m-d'))
            ->get()
            ->first();
    }

    /**
     * @param string $inn
     * @param Carbon $date
     * @param bool $isSelfEmployed
     * @param bool $status
     * @param string|null $code
     * @param string|null $message
     * @return Inn
     */
    public function create(string $inn, Carbon $date, bool $isSelfEmployed, bool $status, ?string $code, ?string $message): Inn
    {
        $model = new Inn();
        $model->inn = $inn;
        $model->checkingDate = $date->format('Y-m-d');
        $model->isSelfEmployed = $isSelfEmployed;
        $model->resStatus = $status;
        $model->resCode = $code;
        $model->resMessage = $message;

        if (!$model->save()) {
            throw new \RuntimeException('Inn saving error');
        }

        return $model;
    }
}
