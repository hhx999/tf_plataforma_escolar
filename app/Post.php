<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 
    ];

    protected $dates = ['published_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category() 
    {
    	return $this->belongsTo(Category::class);
    }
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
                ->where('published_at', '<=', Carbon::now())
                ->latest('published_at');
    }
    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }
    public static function create(array $attributes = [])
    {
        #Creamos post con titulo
        $post = static::query()->create($attributes);

        $post->generateUrl();
        
        return $post;
    }
    public function generateUrl()
    {
        #Obtenemos la url y la hacemos amigable
        $url = str_slug($this->title);

        #Comprobamos si se duplica
        if ( $this->whereUrl($url)->exists() ) {
            #Si existe agregamos id al final
            $url = $url . "-{$this->id}";
        }

        #Asignamos url al post 
        $this->url = $url;

        $this->save();
    }
    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }
    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) 
                                                ? $category 
                                                : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }
}