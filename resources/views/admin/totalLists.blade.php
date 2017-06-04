@extends('layout.main')

@section('content')

<div class="ui grid">

    <div class="four wide column computer only">

        <table class="ui celled table">
            <thead>
                <tr>
                    <th>編號</th>
                    <th>班級</th>
                    <th>座號</th>
                    <th>姓名</th>
                </tr>
            </thead>
            <tbody>
                @foreach($info['member'] as $infos)
                    <tr>
                        <td>{{ $infos->id }}</td>
                        <td>{{ $infos->class_id }}</td>
                        <td>{{ $infos->numbers }}</td>
                        <td>{{ $infos->firstname }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="twelve wide column computer only">

        <table class="ui celled table">
            <thead>
                <tr>
                    @foreach($info['attend_book'] as $infos)
                        <th data-inverted="" data-tooltip="{{ $infos->start }} ~ {{ $infos->end }}" data-position="top left">{{ substr($infos->title, 5) }}</th>
                    @endforeach
                    <th>
                        出席次數
                    </th>
                </tr>
            </thead>
            <tbody>

                @php ($index = 0)
                @foreach($info['student_id'] as $infos)
                    @php ($attendtotal = 0)
                    <tr>

                            @foreach($info['attend'] as $infos)

                                @if ( $infos->username == $info['student_id'][$index] )
                                    <td>
                                        @php
                                            switch ($infos->record) {
                                                case 0:
                                                    echo '出席';
                                                    $attendtotal++;
                                                    break;
                                                case 1:
                                                    echo '遲到';
                                                    $attendtotal++;
                                                    break;
                                                case 2:
                                                    echo '早退';
                                                    $attendtotal++;
                                                    break;
                                                case 3:
                                                    echo '未到';
                                                    break;
                                                default:
                                                    break;
                                            }
                                        @endphp
                                    </td>
                                @endif

                            @endforeach
                        @php ($index++)
                        <td>{{ $attendtotal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

        <div class="sixteen wide column mobile only">
            <div class="ui success message">
                <i class="close icon" onclick="window.location.href='{{ url('/admin/attend') }}'"></i>
                <div class="header">
                    請使用大螢幕設備觀看紀錄！
                </div>
            </div>
        </div>

</div>

@endsection
