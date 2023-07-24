<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MarkModel;
use App\Models\Mark;
use EloquentFilter\Filterable;

class Car extends Model
{
    use HasFactory, Filterable;

    public function mark(){
        return $this->belongsTo(Mark::class);
    }

    public function model(){
        return $this->belongsTo(MarkModel::class);
    }
}
