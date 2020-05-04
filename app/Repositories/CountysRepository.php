<?php

namespace App\Repositories;

class CountysRepository
{
    public function get(): array
    {
        return [
            'Taipei'    => '臺北市',
            'NewTaipei' => '新北市',
            'Taichung'  => '臺中市',
            'Kaohsiung' => '高雄市',
        ];
    }
}
