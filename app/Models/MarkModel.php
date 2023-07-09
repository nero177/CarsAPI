<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mark;

class MarkModel extends Model //model of mark
{
    use HasFactory;

    protected $fillable = ['name', 'mark_id'];

    public function mark(){
        return $this->belongsTo(Mark::class);
    }
}
