<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entities\Chart5
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereIsRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart5 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chart5 extends Model
{
    //
    protected $table = "_5__charts";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'name',
        'type',
        'is_dynamic',
        'is_rounding',
        'results',
    ];

    // protected $guarded =[];

    protected $hidden = [
        'deleted_at',
    ];
}
