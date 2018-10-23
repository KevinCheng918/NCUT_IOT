<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entities\Chart4
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereIsRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Chart4 whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chart4 extends Model
{
    //
    protected $table = "_4__charts";

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
