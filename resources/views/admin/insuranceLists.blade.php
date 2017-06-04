@extends('layout.main')

@section('content')

<div class="ui grid">

    <div class="four wide column computer only">

        <div class="ui secondary vertical pointing menu">
            <a class="item" href="{{ url('/admin') }}">
                學員
            </a>
            <a class="active item" href="{{ url('/admin/attend') }}">
                出席
            </a>
            <a class="item" href="{{ url('/admin/attend/total') }}">
                出缺勤
            </a>
            <a class="item" href="{{ url('/admin/attend') }}">
                保險冊
            </a>
        </div>

    </div>

    <div class="twelve wide column computer only">

        <div class="ui segment basic">
            <a href="{{ url('/admin/attend/create') }}"><button class="ui icon button grey fluid"><i class="plus icon"></i> 保險單</button></a>
        </div>

        <table class="ui celled table">
            <thead>
                <tr>
                    <th>名稱</th>
                    <th>地點</th>
                    <th>日期</th>
                    <th>參加人數</th>
                    <th>詳細資訊</th>
                </tr>
            </thead>
            <tbody>
                @foreach($info as $insurance)
                    <tr>
                        <td>{{ $insurance->title }}</td>
                        <td>{{ $insurance->location }}</td>
                        <td>{{ $insurance->activity_date }}</td>
                        <td>18</td>
                        <td class="center aligned">
                            <a href="{{ url('/admin/insurance/'.$insurance->id.'') }}"><button type="button" class="ui icon button basic"><i class="caret right icon green"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection
