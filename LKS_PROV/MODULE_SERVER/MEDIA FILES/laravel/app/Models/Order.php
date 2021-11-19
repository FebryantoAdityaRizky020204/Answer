<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;
use App\Models\Bus;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
