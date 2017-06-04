@extends('layout.main')

@section('content')

<div class="ui grid">

    <!-- computer -->
    <div class="sixteen wide column computer only">
        <form action="" method="post" class="ui icon input">
            {{ csrf_field() }}
            <input type="text" name="search" placeholder="輸入關鍵字搜尋...">
            <i class="circular search link icon"></i>
        </form>
    </div>

    <!-- menu -->
    <div class="four wide column computer only">
        <div class="ui secondary vertical pointing menu">
            <a class="active item" href="{{ url('/admin') }}">
                學員
            </a>
            <a class="item" href="{{ url('/admin/attend') }}">
                出席
            </a>
            <a class="item" href="{{ url('/admin/attend') }}">
                保險冊
            </a>
        </div>
    </div>

    <!-- main -->
    <div class="twelve wide column computer only">
        <table class="ui unstackable table attached segment">
            <thead>
                <tr class="center aligned">
                    <td>班級</td>
                    <td>座號</td>
                    <td>姓名</td>
                    <td>生日</td>
                    <td>身分證字號</td>
                    <td>監護人</td>
                    <td>素食</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $info)
                <tr class="center aligned">
                    <td>{{ $info->class_id }}</td>
                    <td>{{ $info->numbers }}</td>
                    <td>{{ $info->firstname }}</td>
                    <td>{{ $info->birthday }}</td>
                    <td>{{ $info->identity_id }}</td>
                    <td>{{ $info->guardian }}</td>
                    <td>{{ ($info->vegetarianism == 1 ) ? "✔":'' }}</td>
                    <td><a href="{{ url('/admin/'.$info->id.'/edit') }}"><button class="ui button basic icon" type="button"><i class="edit icon blue"></i></button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- mobile -->
    <div class="sixteen wide column mobile only">
        <form action="" method="post" class="ui fluid icon input">
            {{ csrf_field() }}
            <input type="text" name="search" placeholder="輸入關鍵字搜尋...">
            <i class="circular search link icon"></i>
        </form>
    </div>

    <div class="sixteen wide column mobile only">
        <div class="ui cards stackable">
            @foreach($user as $info)
                <div class="card">
                    <div class="content fluid">
                        <div class="meta right floated">
                            <button class="ui blue icon basic button" onclick="window.location.href='{{ url('/admin/'.$info->id.'/edit') }}'">
                                <i class="edit icon"></i>
                            </button>
                        </div>
                        <div class="header">
                            <i class="user icon"></i> {{ $info->firstname }}<br />
                            <i class="birthday icon"></i> {{ $info->birthday }}<br />
                            <i class="hashtag icon"></i> {{ $info->class_id }}  {{ $info->numbers }}<br />
                            <i class="payment icon"></i> {{ $info->identity_id }}<br/ >
                            <i class="street view icon"></i> {{ $info->guardian }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
