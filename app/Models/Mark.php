<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MarkModel;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function models(){
        return $this->hasMany(MarkModel::class);
    }
}
