<?php
namespace App\Models\Repositories;

use App\Models\Entities\Chart1;
use App\Models\Entities\Chart2;
use App\Models\Entities\Chart3;
use App\Models\Entities\Chart4;
use App\Models\Entities\Chart5;
use App\Models\Entities\Chart6;
use App\Models\Entities\Chart7;
use App\Models\Entities\Chart8;

class AllChartRepository
{
    protected $chart_table;

    public function __construct($chart_num)
    {
        switch ($chart_num) {
            case '1':
                $this->chart_table = new Chart1;
                break;
            case '2':
                $this->chart_table = new Chart2;
                break;
            case '3':
                $this->chart_table = new Chart3;
                break;
            case '4':
                $this->chart_table = new Chart4;
                break;
            case '5':
                $this->chart_table = new Chart5;
                break;
            case '6':
                $this->chart_table = new Chart6;
                break;
            case '7':
                $this->chart_table = new Chart7;
                break;
            case '8':
                $this->chart_table = new Chart8;
                break;
            default:
                break;
        }
    }
    /**
     * 創建chart
     * @return void
     */
    public function Create($channel_id, $chart_name)
    {
        $this->chart_table
            ->create([
                'channel_id' => $channel_id,
                'name'       => $chart_name,
            ]);
    }
    /**
     * chart的細項設定
     * @return void
     */
    public function SetDetail($channel_id, $chart_name, $type, $is_dynamic, $is_rounding, $results)
    {
        $this->chart_table
            ->orderBy('channel_id', 'asc')
            ->find($channel_id)
            ->update([
                'chart_name'  => $chart_name,
                'type'        => $type,
                'is_dynamic'  => $is_dynamic,
                'is_rounding' => $is_rounding,
                'results'     => $results,
            ]);
    }

    /**
     * 找出所有屬於channel_id的charts
     * @return array
     */
    public function FindChart($channel_id)
    {
        return $this->chart_table->orderBy('channel_id', 'asc')->where('channel_id', '=', $channel_id)->get();
    }

}
