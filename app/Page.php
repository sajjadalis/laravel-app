<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getSlugAttribute(): string
    {
        return str_slug($this->title);
    }
    public function getUrlAttribute(): string
    {
        return action('PageController@show', [$this->id, $this->slug]);
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
