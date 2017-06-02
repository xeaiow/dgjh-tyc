@extends('layout.main')

@section('content')

<div class="ui grid">

    <div class="four wide column computer only">

        <table class="ui celled table">
            <thead>
                <tr>
                    <th>班級</th>
                    <th>座號</th>
                    <th>姓名</th>
                </tr>
            </thead>
            <tbody>
                @foreach($info['member'] as $infos)
                    <tr>
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
                        <th>{{ $infos->title }} {{ $infos->start }} - {{ $infos->end }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @php ($index = 0)
                @foreach($info['student_id'] as $infos)
                    <tr>

                            @foreach($info['attend'] as $infos)

                                @if ( $infos->username == $info['student_id'][$index] )
                                    <td>
                                        @php
                                            switch ($infos->record) {
                                                case 0:
                                                    echo '出席';
                                                    break;
                                                case 1:
                                                    echo '遲到';
                                                    break;
                                                case 2:
                                                    echo '早退';
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

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection
