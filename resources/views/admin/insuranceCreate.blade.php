@extends('layout.main')

@section('content')

    <div class="twelve wide column computer only">

        <form action="" class="ui form" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label>活動名稱</label>
                <input type="text" name="title" placeholder="ex. 音樂會表演">
            </div>
            @if ( $errors->first('title') )
                <!-- 錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('title') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>地點</label>
                <input type="text" name="location" placeholder="ex. 中原大學">
            </div>
            @if ( $errors->first('location') )
                <!-- 錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('location') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>活動日期</label>
                <input type="date" name="activity_date">
            </div>
            @if ( $errors->first('activity_date') )
                <!-- 錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('activity_date') }}！
                    </div>
                </div>
            @endif
            <h2 class="ui header center aligned"><i class="users icon"></i>師生名單</h2>

            <table class="ui unstackable table attached segment">
                <thead>
                    <tr>
                        <td>班級</td>
                        <td>座號</td>
                        <td>姓名</td>
                        <td class="center aligned">點名</td>
                    </tr>
                </thead>
                <tbody>
                @php ($index = 0)
                @foreach($user as $users)
                    <tr>
                        <td>{{ $users->class_id }}</td>
                        <td>{{ $users->numbers }}</td>
                        <td>{{ $users->firstname }}</td>
                        <td class="center aligned">
                            <div class="inline field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="joined[{{ $index }}]" value="{{ $users->id }}" class="hidden">
                                    <label>參加</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                @php (++$index)
                @endforeach
                </tbody>
            </table>

            <input class="ui primary button fluid" type="submit" value="新增活動">
        </form>
    </div>


    <!-- mobile -->
    <div class="sixteen wide column mobile only">

        <form action="" class="ui form" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label>標題 (日期)</label>
                <input type="text" name="title" placeholder="ex. 2017/5/30" value="{{ date('Y/m/d') }}">
            </div>
            @if ( $errors->first('title') )
                <!-- 錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('title') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>描述 (可空)</label>
                <textarea name="description" placeholder="ex. 第一次練習"></textarea>
            </div>
            @if ( $errors->first('description') )
                <!-- 錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('description') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>活動時間</label>
                <div class="two fields">
                    <div class="field">
                        <input type="time" name="start">
                    </div>~
                    <div class="field">
                        <input type="time" name="end">
                    </div>
                </div>
                @if ( $errors->first('start') )
                    <!-- 錯誤訊息 -->
                    <div class="ui negative message">
                        <div class="header">
                            {{ $errors->first('start') }}！
                        </div>
                    </div>
                @endif
                @if ( $errors->first('end') )
                    <!-- 錯誤訊息 -->
                    <div class="ui negative message">
                        <div class="header">
                            {{ $errors->first('end') }}！
                        </div>
                    </div>
                @endif
            </div>
            <h2 class="ui header center aligned"><i class="users icon"></i>學生名單</h2>

            <div class="ui cards stackable">
                @php ($index = 0)
                @foreach($user as $users)
                    <div class="card">
                        <div class="content">
                            <div class="header">
                                班級： {{ $users->class_id }}<br />
                                座號： {{ $users->numbers }}<br />
                                姓名： {{ $users->firstname }}<br />
                            </div><hr>
                            <div class="inline field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="joined[{{ $index }}]" value="{{ $users->id }}" class="hidden">
                                    <label>參加</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php (++$index)
                    @endforeach
            </div>


            <input class="ui primary button fluid" type="submit" value="新增點名單">
        </form>

    </div>

</div>

<script>
    $('.menu .item').tab();
    $('.ui.checkbox').checkbox();
</script>

@endsection
