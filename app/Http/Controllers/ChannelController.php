<?php

namespace App\Http\Controllers;

use App\Models\Services\ChartService;
use Illuminate\Http\Request;
use App\Models\Services\ChannelService;
use Auth;

class ChannelController extends Controller
{

    protected $ChannelService;


    public function __construct()
    {
        $this->ChannelService = new ChannelService;
    }

    public function CreateChannel(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $this->ChannelService->CreateChannel($user_id, $request->input('channel_name'));
            return redirect(url()->previous());
        } else {
            return view('pages.home');
        }
    }

    public function EditChannel(Request $request)
    {
        if (Auth::check()) {
            $this->ChannelService
                ->EditChannel(
                    $request['id'],
                    $request['channel_name'],
                    $request['description'],
                    $request['is_show_video'] == 'on' ? 1 : 0,
                    $request['video_url']
                );
            return redirect(url()->previous());
        } else {
            return view('pages.home');
        }
    }

    public function EditChart(Request $request)
    {
        
        if (Auth::check()) {
            $this->ChannelService
                ->EditChart(
                    $request['chart_num'],
                    $request['id'],
                    $request['chart_name'],
                    $type='line',
                    $request['is_dynamic'] == 'on' ? 1 : 0,
                    $request['is_rounding']== 'on' ? 1 : 0,
                    $request['results']
                    );
            return redirect(url()->previous());
        } else {
            return view('pages.home');
        }
    }

    //
    public function select($id = null)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if ($id == null) {
                $channels = $this->ChannelService->GetChannelByUId($user_id);
                return view('pages.channels')->with('channels', $channels);
            } else {
                $this->ChannelService = new ChannelService;
                $channel = $this->ChannelService->GetChannelById($id);
                $charts = $this->ChannelService->GetAllChartById($id);
                $isOwner = $channel['user_id'] == $user_id;

                return view('pages.channel')
                    ->with('channel', $channel)
                    ->with('charts', $charts)
                    ->with('isOwner', $isOwner);
            }
        } else {
            return view('pages.home');
        }
    }

    public function displayChart($id, $chart_num)
    {
        if (Auth::check()) {
            if ($this->ChannelService->GetChannelById($id)['user_id'] == Auth::user()->id) {
                $name = $_GET['name'];
                $type = $_GET['type'];
                $is_dynamic = $_GET['is_dynamic'];
                $is_rounding = $_GET['is_rounding'];
                $results = $_GET['results'];
                return view('pages.chart')
                    ->with('id', $id)
                    ->with('chart_num', $chart_num)
                    ->with('name', $name)
                    ->with('type', $type)
                    ->with('is_rounding', $is_rounding)
                    ->with('is_dynamic', $is_dynamic)
                    ->with('results', $results);
            } else {
                return 'Ae';
            }
        } else {
            return view('pages.home');
        }
    }

    public function DataCount($id, $chart_num)
    {

        if (isset($_GET['key']) && $_GET['key'] != null && $_GET['key'] != ''
            && $_GET['key'] == $this->ChannelService->GetChannelById($id)['readkey']) {

            return response(json_encode($this->ChannelService->GetDataCountByChannelId($chart_num, $id)));

        } elseif (Auth::check()
            && $this->ChannelService->GetChannelById($id)['user_id'] == Auth::user()->id) {

                return response(json_encode($this->ChannelService->GetDataCountByChannelId($chart_num, $id)));

        } else {
            return response('Ae');
        }
    }

    public function findChartData($id, $chart_num)
    {
        if (isset($_GET['key']) && $_GET['key'] != null && $_GET['key'] != ''
            && $_GET['key'] == $this->ChannelService->GetChannelById($id)['readkey']) {

                $data = $this->ChannelService->GetDataByChannelId($chart_num, $id);
                if (isset($_GET['results']) && $_GET['results'] != null && $_GET['results'] != '') {
                    $results = $_GET['results'];
                    if ($results > count($data)) {
                        $results = count($data);
                    }
                    $arr = array();
                    for ($i = count($data) - $results; $i < count($data); $i++) {
                        $arr = array_merge($arr, array($data[$i]));
                    }
                    $data = $arr;
                }
                return response(json_encode($data));

        } elseif (Auth::check()
            && $this->ChannelService->GetChannelById($id)['user_id'] == Auth::user()->id) {

                $data = $this->ChannelService->GetDataByChannelId($chart_num, $id);

                if (isset($_GET['results']) && $_GET['results'] != null && $_GET['results'] != '') {

                    $results = $_GET['results'];
                    if ($results > count($data)) {
                        $results = count($data);
                    }
                    $arr = array();
                    for ($i = count($data) - $results; $i < count($data); $i++) {
                        $arr = array_merge($arr, array($data[$i]));
                    }
                    $data = $arr;
                }
                return response(json_encode($data));

        } else {
            return response('Ae');
        }
    }


    public function insertChartData()
    {
        if (isset($_GET['key']) && $_GET['key'] != null && $_GET['key'] != '') {
            for ($i = 1; $i <= 8; $i++) {
                if (isset($_GET["chart$i"]) && $_GET["chart$i"] != null && $_GET["chart$i"] != '') {
                    $this->ChannelService->InsertData($_GET['key'], $i, $_GET["chart$i"]);
                }
            }
            return response('Su');
        } else {
            return response('Ae');
        }
    }
}
