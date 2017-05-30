@extends('layout.main')

@section('content')

    <div class="ui grid">
        <div class="sixteen wide column">

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
                                            echo "○";
                                            break;
                                        case 1:
                                            echo "▲";
                                            break;
                                        case 2:
                                            echo "◎";
                                            break;
                                        case 3:
                                            echo "△";
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
