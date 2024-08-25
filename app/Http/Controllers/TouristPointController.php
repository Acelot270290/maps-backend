<?php

namespace App\Http\Controllers;

use App\Actions\TouristPointAction;
use App\Http\Requests\CreateTouristPointRequest;
use App\Http\Requests\UpdateTouristPointRequest;

class TouristPointController extends Controller
{
    protected $touristPointAction;

    public function __construct(TouristPointAction $touristPointAction)
    {
        $this->touristPointAction = $touristPointAction;
    }

    public function store(CreateTouristPointRequest $request)
    {
        $touristPoint = $this->touristPointAction->create($request->validated());
        return response()->json($touristPoint, 201);
    }

    public function index()
    {
        $touristPoints = $this->touristPointAction->list();
        return response()->json($touristPoints);
    }

    public function show($uid)
    {
        $touristPoint = $this->touristPointAction->get($uid);
        return response()->json($touristPoint);
    }

    public function update(UpdateTouristPointRequest $request, $uid)
    {
        $touristPoint = $this->touristPointAction->update($uid, $request->validated());
        return response()->json($touristPoint);
    }

    public function destroy($uid)
    {
        $this->touristPointAction->delete($uid);
        return response()->json(['message' => 'Ponto turístico deletado com sucesso.'], 200);
    }
}
