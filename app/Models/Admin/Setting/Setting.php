<?php


namespace App\Models\Admin\Setting;




use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'logo',
        'icon',
        'updated_by',
        'open_time',
        'close_time',
        'open_day',
        'close_day',
        'location',
        'contact_no',
        'facebook_link',
        'twitter_link',
        'linkdlin_link',
        'instagram_link',
        'youtube_link',
        'email',
        'title_tag',
        'meta_description',
        'meta_keywords',

    ];
}
