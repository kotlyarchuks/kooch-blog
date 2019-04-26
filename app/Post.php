<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function created_at()
    {
        return $this->created_at->toDateTimeString();
    }
}
