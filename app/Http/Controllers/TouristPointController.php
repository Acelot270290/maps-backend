<?php

namespace App\Http\Controllers;

use App\Models\TouristPoint;
use Illuminate\Http\Request;

class TouristPointController extends Controller
{
    public function index()
    {
        // Retorna todos os pontos turísticos no formato esperado pelo frontend
        return response()->json([
            'data' => TouristPoint::all()->map(function ($point) {
                return [
                    'uid' => $point->uid,
                    'attributes' => [
                        'createdAt' => $point->created_at,
                        'author' => $point->author,
                        'latitude' => $point->latitude,
                        'longitude' => $point->longitude,
                        'descricao' => $point->descricao,
                        'updatedAt' => $point->updated_at,
                    ],
                ];
            }),
        ]);
    }

    public function store(Request $request)
    {
        // Validação básica
        $request->validate([
            'uid' => 'required|unique:tourist_points,uid',
            'latitude' => 'required',
            'longitude' => 'required',
            'descricao' => 'required',
        ]);

        // Criação do ponto turístico
        $touristPoint = TouristPoint::create($request->all());

        return response()->json($touristPoint, 201);
    }

    // Outros métodos como update, delete, show, etc., podem ser adicionados conforme necessário
}
