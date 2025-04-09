<?php

namespace App\Repositories\Setting;

use App\Models\Setting;
use App\Repositories\BaseRepository;


class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    public function __construct(Setting $model){
        parent::__construct($model);
    }

    public function getKeyValues(array $keys){
        return $this->model->where('keys',$keys)->get();
    }
}
