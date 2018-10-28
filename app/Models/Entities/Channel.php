<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use SoftDeletingTrait;

/**
 * App\Models\Entities\Channel
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $readkey
 * @property string|null $writekey
 * @property string $name
 * @property string|null $description
 * @property int $is_show_video
 * @property string|null $video_url
 * @property int $update_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereIsShowVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereReadkey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereUpdateCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entities\Channel whereWritekey($value)
 * @mixin \Eloquent
 */
class Channel extends Model
{

    protected $dates = ['deleted_at'];
    //from channels
    protected $table = 'channels';

    protected $fillable = [
        'user_id',
        'name',
        'writekey',
        'readkey',
        'channel_name',
        'description',
        'is_show_video',
        'video_url',
        'update_count',
    ];

    // protected $guarded =['*'];

    protected $hidden = [
        'readkey', 'writekey','deleted_at',
    ];
}
