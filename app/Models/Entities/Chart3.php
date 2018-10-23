<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entities\Chart3
 *
 * @property int $channel_id
 * @property string $name
 * @property string $type
 * @property int $is_dynamic
 * @property int $is_rounding
 * @property int $results
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereIsRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart3 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chart3 extends Model
{
    //
    protected $table = "_3__charts";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'channel_id',
        'name',
        'type',
        'is_dynamic',
        'is_rounding',
        'results',
    ];

    // protected $guarded =[];
}
