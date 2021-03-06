<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnergyFlow extends Model
{
    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'energy_flow';
    /**
     * @var array
     */
    protected $fillable = ['type','energy','user_id','other'];
    /**
     * @var int
     */
    public $query_page = 10;
    /**
     * @var array
     */
    protected $and_fields = ['user_id','type'];
    /**
     * @var array
     */
    protected $hidden = ['other'];
    /**
     * @var array
     */
    protected $appends = ["show_type"];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buy_gold_detail()
    {
        return $this->hasOne('App\BuyGoldDetail','flow_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo('App\Member','user_id');
    }

    /**
     * @return array
     */
    public function getAndFieds():array
    {
        return $this->and_fields??[];
    }

    public function getShowTypeAttribute()
    {
        return config("czf.energy_show_type")[$this->type];
    }

}
