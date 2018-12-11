<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RssCategory.
 *
 * @package namespace App\Entities;
 */
class RssCategory extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'rss_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    public function rssFeeds()
    {
        return $this->hasMany('App\RssFeed', 'rss_category_id');
    }
}
