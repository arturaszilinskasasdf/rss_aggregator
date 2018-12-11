<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RssFeed.
 *
 * @package namespace App\Entities;
 */
class RssFeed extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'rss_feeds';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    public function rssFeedItems()
    {
        return $this->hasMany('App\RssFeedItem', 'rss_feed_id');
    }

    public function rssCategory()
    {
        return $this->belongsTo('App\RssCategory');
    }

    public function rssProvider()
    {
        return $this->belongsTo('App\RssProvider');
    }

}
