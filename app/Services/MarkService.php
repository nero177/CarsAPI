<?php

namespace App\Services;

use App\Models\MarkModel;
use Illuminate\Http\Request;
use App\Models\Mark;

class MarkService
{
    public function show(Request $request, $name)
    {
        $mark = Mark::firstWhere('name', $name);
        $models = MarkModel::whereBelongsTo($mark)->get();
        return $models;
    }
}