<?php
namespace App\Models\Repositories;

use App\Models\Entities\Data1;
use App\Models\Entities\Data2;
use App\Models\Entities\Data3;
use App\Models\Entities\Data4;
use App\Models\Entities\Data5;
use App\Models\Entities\Data6;
use App\Models\Entities\Data7;
use App\Models\Entities\Data8;

class AllDataRepository
{
    protected $data_table;
    public function __construct($data_table_num)
    {
        switch ($data_table_num) {
            case '1':
                $this->data_table = new Data1;
                break;
            case '2':
                $this->data_table = new Data2;
                break;
            case '3':
                $this->data_table = new Data3;
                break;
            case '4':
                $this->data_table = new Data4;
                break;
            case '5':
                $this->data_table = new Data5;
                break;
            case '6':
                $this->data_table = new Data6;
                break;
            case '7':
                $this->data_table = new Data7;
                break;
            case '8':
                $this->data_table = new Data8;
                break;
            default:
                break;
        }
    }
    /**
     * 創建data
     * @return void
     */
    public function CreateData($channel_id, $value)
    {
        $this->data_table->create([
            'channel_id' => $channel_id,
            'value'      => $value,
        ]);
    }
    /**
     * 找出所有屬於channel_id的datas
     * @return array
     */
    public function GetDataByChannelId($channel_id)
    {
        return $this->data_table->orderBy('created_at', 'asc')->where('channel_id', '=', $channel_id)->get();
    }
}
