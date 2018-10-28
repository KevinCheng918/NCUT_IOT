<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entities\Data1
 *
 * @property int $channel_id
 * @property float $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Data1 whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Data1 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Data1 whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Data1 whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Data1 whereValue($value)
 * @mixin \Eloquent
 */
class Data1 extends Model
{
    //
    protected $table = "_1__datas";

    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'value'];

    // protected $guarded =[];

    protected $hidden = [
        'id','deleted_at','updated_at',
    ];
}
