@extends('layouts.layout')
@section('box-header')
    <div class="row">
        <div class="col">
            <h2 class="">
                Channels
            </h2>
        </div>
        <div class="col right">
            <input class="txt-1"
                   type="text" id="myInput" onkeyup="searchChannel()"
                   placeholder="Search for names.."
                   title="Type in a name">
        </div>
    </div>
    <hr>
    <br>
    <div class="row">
        <ul class="txt-1">
            <li>
                <form method="POST" action="{{route('CreChannel')}}">
                    @csrf
                    <input class="col-4"
                        type="text" id="channel_name" name="channel_name"
                           placeholder="Key in channel name.."
                           required>
                </form>
            </li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
@endsection
@section('box-body')
    <div class="row">
        <table class="light">
            <thead class="line">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>UpdCount</th>
                <th>LastUpdated</th>
            </tr>
            </thead>
            <tbody class="line" id="myTable">
            @foreach ($channels as $channel)
                <tr>
                    <th>{{ $channel['id'] }}</th>
                    <td>
                        <a href="{{route('Channels',$channel['id'])}}">
                            {{ $channel['name'] }}
                        </a>
                    </td>
                    <td>{{ $channel['description'] }}</td>
                    <td>{{ $channel['update_count'] }}</td>
                    <td>{{ $channel['updated_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('box-footer')
    <script type="text/javascript">
        function searchChannel() {
            var input, filter, table, tr, td, i, a;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];

                if (td) {
                    a = td.getElementsByTagName("a")[0];
                    if (a) {
                        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }
    </script>
@endsection
