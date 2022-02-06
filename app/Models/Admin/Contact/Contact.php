<?php

namespace App\Models\Admin\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'name',
        'email',
        'contact_no',
        'subject',
        'message',
        'image',
        'meta_keywords',
        'created_by',
    ];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}
