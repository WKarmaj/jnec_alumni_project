<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Mail;

use App\Mail\ContactMail;

class Contact extends Model
{
    use HasFactory;

    public $fillable = ['name', 'email', 'phone', 'message'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "05210224.jnec@rub.edu.bt";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
