<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RssProvider.
 *
 * @package namespace App\Entities;
 */
class RssProvider extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'rss_providers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    public function rssFeeds()
    {
        return $this->hasMany('App\RssFeed', 'rss_provider_id');
    }

}
