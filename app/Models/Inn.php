<?php

namespace App\Models;

use App\ViewModels\InnViewModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inn
 * @package App\Models
 *
 * @property string $inn
 * @property string $checkingDate
 * @property bool $isSelfEmployed
 * @property bool $resStatus
 * @property string|null $resCode
 * @property string|null $resMessage
 */
class Inn extends Model
{
    use HasFactory;

    protected $table = 'inns';

    public function getViewModel(): InnViewModel
    {
        return new InnViewModel($this);
    }
}
