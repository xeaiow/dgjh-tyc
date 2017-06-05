@extends('layout.main')

@section('content')

    <div class="twelve wide column computer only">

        <div class="ui segment basic">
            <a href="{{ url('/admin/insurance/create') }}"><button class="ui icon button grey fluid"><i class="plus icon"></i> 保險單</button></a>
        </div>

        <table class="ui celled table center aligned">
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
                        <td>{{ $insurance->joined }}</td>
                        <td class="center aligned">
                            <a href="{{ url('/admin/insurance/'.$insurance->id.'') }}"><button type="button" class="ui icon button basic"><i class="caret right icon green"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="sixteen wide column mobile only">

        <div class="ui segment basic">
            <a href="{{ url('/admin/insurance/create') }}"><button class="ui icon button grey fluid"><i class="plus icon"></i> 保險單</button></a>
        </div>

        <div class="ui cards stackable">
            @foreach($info as $insurance)
                <div class="card">
                    <div class="content fluid">

                        <div class="header">
                            <i class="user icon"></i> {{ $insurance->title }}<br />
                            <i class="map pin icon"></i> {{ $insurance->location }}<br />
                            <i class="calendar icon"></i> {{ $insurance->activity_date }}<br />
                            <i class="user icon"></i> {{ $insurance->joined }}<br/ >
                        </div><br/>
                        <a href="{{ url('/admin/insurance/'.$insurance->id.'') }}"><button class="ui icon button basic fluid"><i class="caret right icon green"></i></button></a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>

@endsection
