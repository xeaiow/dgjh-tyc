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

    <div class="sixteen wide column computer only">
        <table class="ui unstackable table attached segment">
            <thead>
                <tr>
                    <td>班級</td>
                    <td>座號</td>
                    <td>姓名</td>
                    <td>生日</td>
                    <td>身分證字號</td>
                    <td>監護人</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $info)
                <tr>
                    <td>{{ $info->class_id }}</td>
                    <td>{{ $info->numbers }}</td>
                    <td>{{ $info->firstname }}</td>
                    <td>{{ $info->birthday }}</td>
                    <td>{{ $info->identity_id }}</td>
                    <td>{{ $info->guardian }}</td>
                    <td><a href="{{ url('/admin/'.$info->id.'/edit') }}"><button class="ui button green tiny" type="button">編輯</button></a></td>
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
        <div class="ui cards">
            @foreach($user as $info)
                <div class="card">
                    <div class="content">
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
