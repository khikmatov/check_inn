<?php

namespace App\ViewModels;

use App\Models\Inn;

class InnViewModel
{
    private $model;

    public function __construct(Inn $model)
    {
        $this->model = $model;
    }

    public function getInn(): string
    {
        return $this->model->inn;
    }

    public function getStatus(): bool
    {
        return $this->model->resStatus;
    }

    public function getStatusText(): string
    {
        return $this->model->resStatus ? 'Успешный' : 'С ошибкой';
    }

    public function getSelfEmployedStatus(): string
    {
        if ($this->model->resStatus) {
            return $this->model->isSelfEmployed ? 'Самозанятый' : 'Не самозанятый';
        }

        return '';

        return "Код ошибки: {$this->model->resCode}<br>Текст ошибки: {{$this->model->resMessage}}";
    }

    public function getCode(): string
    {
        return $this->model->resStatus ? '': $this->model->resCode;
    }

    public function getMessage(): string
    {
        return $this->model->resStatus ? '': $this->model->resMessage;
    }
}
