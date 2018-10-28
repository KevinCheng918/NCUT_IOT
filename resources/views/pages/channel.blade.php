@extends('layouts.layout')




@section('box-header')
    <div class="row">
        <div class="col">
            <h2 class="">
                ChannelName:{{$channel['name']}}
                @if($isOwner)
                    <a id="EditChannelBtn"
                       data-modal-btn="EditChannelModal"
                       onclick="chgModal(this)"
                       href="javascript:void(this)">
                        <i class="fas fa-edit"></i>
                    </a>
                @endif
            </h2>
        </div>
    </div>
    <hr>
    <br>
    <div class="row">
        <table class="light">
            <tbody>
            <tr>
                <th>ChannelId:</th>
                <td>{{$channel['id']}}</td>
            </tr>
            @if($isOwner)
                <tr>
                    <th>ReadApiKey:</th>
                    <td>{{$channel['readkey']}}</td>
                </tr>
                <tr>
                    <th>WriteApiKey:</th>
                    <td>{{$channel['writekey']}}</td>
                </tr>
            @endif
            <tr>
                <th>UpdCount:</th>
                <td>{{$channel['update_count']}}</td>
            </tr>
            <tr>
                <th>LastUpdated:</th>
                <td>{{$channel['updated_at']}}</td>
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{$channel['description']}}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
@section('box-body')
    <div class="row">
        <div class="chart-container">
            @if($channel['is_show_video'])
                <div class="chart-box">
                    <div class="txt-c chart-name">
                        Video
                    </div>
                    <div class="chart-content">
                        {!! $channel['video_url'] !!}
                    </div>
                </div>
            @endif
            @for($i=0;$i<count($charts);$i++)
                <div class="chart-box">
                    <div class="txt-c chart-name">
                        <i class="txt-1">Chart{{$i+1}}</i>
                        <a href="javascript:void(this)"
                        data-reiframe-btn="ifr{{$i}}"
                        onclick="reloadIframe(this)"
                        class="right">
                        <i class="fas fa-redo-alt"></i>
                        </a>
                        @if($isOwner)
                            <a href="{{ route('Data',[$channel['id'] , $i+1 , 'key'=>$channel['readkey'] ]) }}"
                                target="_blank"
                                data-reiframe-btn="ifr{{$i}}"
                                onclick="reloadIframe(this)"
                                class="right">
                                <i class="fas fa-database"></i>
                            </a>
                            <a id="EditChart{{$i}}Btn"
                                data-modal-btn="EditChart{{$i}}Modal"
                                onclick="chgModal(this)"
                                class="right" href="javascript:void(this)">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endif
                    </div>
                    <div class="chart-content">
                        <iframe id="ifr{{$i}}"
                                name="crt"
                                class="loading"
                                scrolling="no"
                                src="
                                {{
                                    route('Chart',[
                                    'id'=>$charts[$i]['id'],
                                    'chart_num'=>$i+1,
                                    'name'=>$charts[$i]['name'],
                                    'type'=>$charts[$i]['type'],
                                    'is_dynamic'=>$charts[$i]['is_dynamic'],
                                    'is_rounding'=>$charts[$i]['is_rounding'],
                                    'results'=>$charts[$i]['results']
                                    ])
                                }}
                                    "
                                frameborder="0">
                        </iframe>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
@section('box-footer')
    <div id="EditChannelModal" class="modal" data-modal="EditChannelModal">
        <div class="container-m">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="row">
                    <div class="txt-2">
                        <form method="post" action="{{route('EdtChannel')}}">
                            @csrf
                            <div class="card-header">EditChannelDetail</div>
                            <div class="card-body">
                                <input type="text" name="id" value="{{$channel['id']}}" style="display: none">
                                <div class="row">
                                    <label class="col-4 txt-right">ChannelName</label>
                                    <div class="col-6">
                                        <input
                                            type="text" name="channel_name" value="{{$channel['name']}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4 txt-right">IsShowVideo</label>
                                    <div class="col-6">
                                        <input
                                            type="checkbox" name="is_show_video"
                                            @if($channel['is_show_video'])
                                            checked
                                            @endif
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4 txt-right">VideoUrlIframe</label>
                                    <div class="col-6">
                                        <textarea
                                            maxlength="500"
                                            name="video_url" rows="2">
                                                {{$channel['video_url']}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4 txt-right"
                                           style="height: 50%"
                                    >
                                        Description
                                    </label>
                                    <div class="col-6">
                                        <textarea
                                            maxlength="100"
                                            name="description" rows="2">
                                            {{$channel['description']}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 txt-center">
                                        <button type="submit">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @for($i=0;$i<count($charts);$i++)
    <div id="EditChart{{$i}}Modal" class="modal" data-modal="EditChart{{$i}}Modal">
        <div class="container-m">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="row">
                    <div class="txt-2">
                        <form method="post" action="{{route('EdtChart')}}">
                            @csrf
                            <div class="card-header">EditChartDetail</div>
                            <div class="card-body">
                                <input type="text" name="chart_num" value="{{$i+1}}" style="display: none">
                                <input type="text" name="id" value="{{$channel['id']}}" style="display: none">
                                <div class="row">
                                    <label class="col-4 txt-right">ChartName</label>
                                    <div class="col-6">
                                        <input
                                            type="text" name="chart_name" value="{{$charts[$i]['name']}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4 txt-right">is_dynamic</label>
                                    <div class="col-6">
                                        <input
                                            type="checkbox" name="is_dynamic"
                                            @if($charts[$i]['is_dynamic'])
                                            checked
                                            @endif
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4 txt-right">is_rounding</label>
                                    <div class="col-6">
                                        <input
                                            type="checkbox" name="is_rounding"
                                            @if($charts[$i]['is_rounding'])
                                            checked
                                            @endif
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-4 txt-right">results</label>
                                    <div class="col-6">
                                        <input
                                            type="text" name="results" value="{{$charts[$i]['results']}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 txt-center">
                                        <button type="submit">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endfor
    <script type="text/javascript">

        function reloadIframe(elem) {
            let iframe = document.getElementById(elem.getAttribute("data-reiframe-btn"));
            iframe.contentWindow.location.reload();
        }

        // 當btn按下時 讀取data-modal-btn屬性 連接至modal.id
        function chgModal(elem) {
            let modal = document.getElementById(elem.getAttribute("data-modal-btn"));
            modal.style.display = "block";
        }

        // 當modal.id == modal.data-modal時 代表此物件為modal
        window.onclick = function (event) {
            if (event.target.id == event.target.getAttribute("data-modal")) {
                event.target.style.display = "none";
            }

        }
    </script>
@endsection
