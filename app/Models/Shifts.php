<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'id','user_id','identification','patient_name','code','service','note','room','area','window','insurance','status',
    ];
    protected $appends = ['status_spanish'];

    public function getStatusSpanishAttribute(){
        return match (true) {
            $this->status == 'call' => 'Llamando',
            $this->status == 'cancel' => 'Cancelado',
            $this->status == 'wait' => 'En espera',
            $this->status == 'wait_doctor' => 'En espera',
            $this->status == 'done' => 'Atendido',
            default => 'Sin atender',
        };
    }

}
