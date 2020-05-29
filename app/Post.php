<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $fillable = ['title', 'body', 'featured_image'];

    protected $guarded = ['user_id'];

    protected $dates = ['name_field'];

    public function getSlugAttribute(): string
    {
        return str_slug($this->title);
    }

    public function getUrlAttribute(): string
    {
        return action('PostController@show', [$this->id, $this->slug]);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // As we have relationship between post and comment. 
    // All we need to do is $this to get post id
    // Pass fields inside compact('body') which converts to 'body' => $body (request)

    public function addComments()
    {
        $this->comments()->create([
            'name' =>   request('name'),
            'email' =>  request('email'),
            'comment' =>  request('comment')
        ]);

        //$this->comments()->create(request(['name', 'email', 'comment'])); // not working
    }

}
