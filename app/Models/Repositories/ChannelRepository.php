<?php
namespace App\Models\Repositories;

use App\Models\Entities\Channel;

class ChannelRepository
{
    /**
     * 創建新Channel
     */
    public function CreateChannel($user_id, $channel_name)
    {
        return
        Channel::
            create([
            'user_id' => $user_id,
            'name'    => $channel_name,
        ])->id;
    }

    /**
     * 新增write/read key
     */
    public function SetKeys($channel_id, $writekey, $readkey)
    {
        Channel::
            orderBy('id', 'asc')
            ->find($channel_id)
            ->update([
                'writekey' => $writekey,
                'readkey'  => $readkey,
            ]);
    }

    /**
     * 設定channel的細項設定
     */
    public function SetDetail($channel_id, $channel_name, $description, $is_show_video, $video_url)
    {
        Channel::
            orderBy('id', 'asc')
            ->find($channel_id)
            ->update([
                'name'  => $channel_name,
                'description'   => $description,
                'is_show_video' => $is_show_video,
                'video_url'     => $video_url,
            ]);
    }

    /**
     * 利用rkey找Channel
     */
    public function GetByReadKey($readkey)
    {
        return Channel::orderBy('readkey', 'asc')->where('readkey', '=', $readkey)->get();
    }

    public function UpdateCount($channel_id,$count){
        Channel::
        orderBy('id', 'asc')
            ->find($channel_id)
            ->update([
                'update_count'=>$count
            ]);
    }
    /**
     * 利用wkey找Channel
     */
    public function GetChannelIdByWriteKey($writekey)
    {
        return Channel::
        orderBy('writekey', 'asc')
            ->where('writekey', '=', $writekey)->get();
    }
    /**
     * 找出所有屬於user_id的channels
     */
    public function GetByUId($user_id)
    {
        return Channel::orderBy('user_id', 'asc')->where('user_id', '=', $user_id)->get();
    }

    /**
     * 利用主鍵找Channel
     */
    public function GetById($id)
    {
        return Channel::find($id);
    }
    /**
     * 全部channel
     */
    public function GetAll()
    {
        return Channel::all();
    }
}
