<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class admin extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = "admin";

    protected static function boot()
    {
        parent::boot();

        static::creating( function($admin) {
            $admin->password = Hash::make($admin->password);
        });

        static::updating(function(admin $admin) {
            if($admin->isDirty(["password"])){
                $admin->password = Hash::make($admin->password);
            }
        });
    }
}
