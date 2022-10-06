<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private $default_format = 'd-m-Y H:i:s';

    protected $fillable = ['title', 'content', 'category_id', 'slug'];
    // creiamo la relazione con category
    public function category()
    {
        // il verbo che usiamo è belong perche post è l'istanza debole
        return $this->belongsTo('App\Models\Category');
    }
    public function user()
    {
        // il verbo che usiamo è belong perche post è l'istanza debole
        return $this->belongsTo('App\User');
    }
    public function tags()
    {
        // il verbo che usiamo è belongsTomany perchè siamo una relazione many to many
        return $this->belongsToMany('App\Models\Tag');
    }

    // formattazione date con carbon
    public function getCreatedAt()
    {
        return $this->formatDate($this->created_at);
    }
    public function getUpdatedAt()
    {
        return $this->formatDate($this->updated_at);
    }
    public function formatDate($date)
    {
        return Carbon::create($date)->format($this->default_format);
    }
    public function getFormattedDate($column, $format = null)
    {
        $date_format = $format ? $format : $this->default_format;
        return Carbon::create($this->$column)->format($date_format);
    }
}
