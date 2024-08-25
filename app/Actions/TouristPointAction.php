<?php

namespace App\Actions;

use App\Models\TouristPoint;
use Illuminate\Support\Str;

class TouristPointAction
{

    public function create(array $data)
    {
        $touristPoint = TouristPoint::create([
            'uid' => Str::uuid(),
            'author' => $data['author'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'descricao' => $data['descricao'],
        ]);

        return $touristPoint;
    }


    public function list()
    {
        return TouristPoint::all();
    }

    public function get($uid)
    {
        return TouristPoint::where('uid', $uid)->firstOrFail();
    }

    public function update($uid, array $data)
    {
        $touristPoint = $this->get($uid);
        $touristPoint->update($data);

        return $touristPoint;
    }

    public function delete($uid)
    {
        $touristPoint = $this->get($uid);
        $touristPoint->delete();
    }
}
