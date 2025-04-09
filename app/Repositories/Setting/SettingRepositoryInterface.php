<?php

namespace App\Repositories\Setting;

use App\Repositories\BaseRepositoryInterface;

interface SettingRepositoryInterface extends BaseRepositoryInterface
{
    public function getKeyValues(array $keys);
}
