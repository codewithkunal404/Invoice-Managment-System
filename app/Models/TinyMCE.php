<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinyMCE extends Model
{
    protected $table = 'tinymce_configuration';

    protected $fillable = [
        'api_key'];
}
