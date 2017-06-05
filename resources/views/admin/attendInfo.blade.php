@extends('layout.main')

@section('content')

        <div class="twelve wide column computer only">

            <h2 class="ui icon header center aligned">
                <i class="calendar icon"></i>
                <div class="content">
                    {{ $info[0]->title }}
                    <div class="sub header">
                        {{ $info[0]->description }}
                    </div>
                </div>
            </h2>

            <table class="ui unstackable table attached segment">
                <thead>
                    <tr>
                        <td>班級</td>
                        <td>座號</td>
                        <td>姓名</td>
                        <td>狀態</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($info as $infos)
                        <tr>
                            <td>{{ $infos->class_id }}</td>
                            <td>{{ $infos->numbers }}</td>
                            <td>{{ $infos->firstname }}</td>
                            <td>
                                @php
                                    switch ($infos->record) {
                                        case 0:
                                            echo '<a class="ui grey label">出席</a>';
                                            break;
                                        case 1:
                                            echo '<a class="ui red label">遲到</a>';
                                            break;
                                        case 2:
                                            echo '<a class="ui red label">早退</a>';
                                            break;
                                        case 3:
                                            echo '<a class="ui red label">未到</a>';
                                            break;
                                        default:
                                            break;
                                    }
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="sixteen wide column mobile only">

            <h2 class="ui icon header center aligned">
                <i class="calendar icon"></i>
                <div class="content">
                    {{ $info[0]->title }}
                    <div class="sub header">
                        {{ $info[0]->description }}
                    </div>
                </div>
            </h2>

            <table class="ui unstackable table attached segment">
                <thead>
                    <tr>
                        <td>班級</td>
                        <td>座號</td>
                        <td>姓名</td>
                        <td>狀態</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($info as $infos)
                        <tr>
                            <td>{{ $infos->class_id }}</td>
                            <td>{{ $infos->numbers }}</td>
                            <td>{{ $infos->firstname }}</td>
                            <td>
                                @php
                                    switch ($infos->record) {
                                        case 0:
                                            echo '<a class="ui grey label">出席</a>';
                                            break;
                                        case 1:
                                            echo '<a class="ui red label">遲到</a>';
                                            break;
                                        case 2:
                                            echo '<a class="ui red label">早退</a>';
                                            break;
                                        case 3:
                                            echo '<a class="ui red label">未到</a>';
                                            break;
                                        default:
                                            break;
                                    }
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
