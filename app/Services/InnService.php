<?php

namespace App\Services;

use App\Components\ApiCheckInnException;
use App\Components\ApiCheckInnInterface;
use App\Models\Inn;
use App\Repositories\InnRepositoryInterface;
use Carbon\Carbon;

class InnService
{
    private $api;
    private $repository;

    public function __construct(ApiCheckInnInterface $api, InnRepositoryInterface $repository) {
        $this->api = $api;
        $this->repository = $repository;
    }

    public function checkInn(string $inn, Carbon $date): Inn {

        $model = $this->repository->findByInnAndCheckingDate($inn, $date);

        if (!$model instanceof Inn) {
            try {
                $model = $this->repository->create(
                    $inn,
                    $date,
                    $this->api->checkInn($inn, $date),
                    true,
                    null,
                    null);
            } catch (ApiCheckInnException $exception) {
                $model = $this->repository->create(
                    $inn,
                    $date,
                    false,
                    false,
                    $exception->getStatus(),
                    $exception->getMessage()
                );
            }
        }

        return $model;
    }
}
