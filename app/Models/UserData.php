<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date',
        'document_type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
