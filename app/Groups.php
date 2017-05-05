<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Groups extends Model
{
    use Notifiable;
    //
    protected $fillable = [
        'creator_id', 'group_name', 'app_name', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
