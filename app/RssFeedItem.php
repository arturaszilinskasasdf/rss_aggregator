<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RssFeedItem.
 *
 * @package namespace App\Entities;
 */
class RssFeedItem extends Model implements Transformable
{
    use TransformableTrait;

    public $timestamps = false;

    protected $table = 'rss_feed_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'link',
        'description',
        'date',
        'rss_feed_id'
    ];

    protected $fieldSearchable  = [
        'id'
        //'id.rssFeed.rss_provider_id'
    ];

    public function rssFeed()
    {
        return $this->belongsTo('App\RssFeed');
    }

}
