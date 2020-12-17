<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Notifiable;

    protected $guarded = ['id'];
    protected $guard = 'members';

    protected $fillable = ['name', 'user_id', 'email', 'phone_no', 'dob', 'sponser_id', 'sub_sponser_id', 'pin_no', 'addhar_image', 'pan_image', 'father_name', 'mother_name', 'nominee', 'nominee_dob', 'profile_pic', 'address', 'bankdetails'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
