<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appoinment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'doctor_id',
      'patient_id',
      'date',
      'time',
      'statues',
      'deleted_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'patient_id');
    } 
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

  
    
 
}
