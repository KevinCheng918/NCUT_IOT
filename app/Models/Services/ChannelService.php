<?php
namespace App\Models\Services;


use App\Models\Repositories\AllDataRepository;
use App\Models\Repositories\AllChartRepository;
use App\Models\Repositories\ChannelRepository;

/**
 * Channel的創建及軟刪除(須登入權限)
 */
class ChannelService
{

    protected $ChannelRepository;


    public function __construct()
    {
        $this->ChannelRepository = new ChannelRepository;
    }

    /**
     * 創建Channel + Chart*8
     */
    public function CreateChannel($user_id, $channel_name)
    {

        $channel_id = $this->ChannelRepository->CreateChannel($user_id, $channel_name);

        $writekey = md5($channel_id);
        $readkey  = md5($writekey);
        $this->ChannelRepository->SetKeys($channel_id, $writekey, $readkey);

        for ($i = 1; $i <= 8; $i++) {
            $ChartRepository = new AllChartRepository($i);
            $ChartRepository->Create($channel_id, "Chart$i");
        }
    }

    /**
     * 編輯Channel設定
     */
    public function EditChannel($channel_id, $channel_name, $description, $is_show_video, $video_url)
    {
        $this->ChannelRepository->UpdateCount($channel_id,$this->ChannelRepository->GetById($channel_id)['update_count']+1);
        $this->ChannelRepository->SetDetail($channel_id, $channel_name, $description, $is_show_video, $video_url);
    }

    /**
     * 刪除Channel (軟刪除)
     */
    public function DeleteChannel($channel_id)
    {

    }

    /**
     * 用使用者ID搜尋Channel
     */
    public function GetChannelByUId($user_id)
    {
        return $this->ChannelRepository->GetByUId($user_id);
    }

    public function GetChannelById($id)
    {
        return $this->ChannelRepository->GetById($id);
    }

    /**
     * 印出所有Channel
     */
    public function GetAllChannel()
    {
        return $this->ChannelRepository->GetAll();
    }


    public function EditChart($chart_num,$channel_id, $chart_name, $type, $is_dynamic, $is_rounding, $results)
    {
        $ChartRepository = new AllChartRepository($chart_num);
        $ChartRepository->SetDetail($channel_id, $chart_name, $type, $is_dynamic, $is_rounding, $results);
    }




    public function GetAllChartById($id)
    {
        $chart =array();
        for ($i=1;$i<=8;$i++){
            $ChartRepository = new AllChartRepository($i);
            array_push($chart , $ChartRepository->FindChart($id)[0]) ;
        }
        return $chart;
    }

    public function GetDataByChannelId($chart_num, $id)
    {
        $DataRepository = new AllDataRepository($chart_num);
        return $DataRepository->GetDataByChannelId($id);
    }

    public function GetDataCountByChannelId($chart_num, $id)
    {
        $DataRepository = new AllDataRepository($chart_num);
        return count($DataRepository->GetDataByChannelId($id));
    }


    public function InsertData($key,$chart_num,$value){
        $DataRepository = new AllDataRepository($chart_num);
        $id = $this->ChannelRepository->GetChannelIdByWriteKey($key)[0]['id'];
        $this->ChannelRepository->UpdateCount($id,$this->ChannelRepository->GetChannelIdByWriteKey($key)[0]['update_count']+1);
        $DataRepository->CreateData($id,$value);
    }



}
