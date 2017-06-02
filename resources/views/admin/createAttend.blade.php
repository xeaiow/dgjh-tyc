@extends('layout.main')

@section('content')

<div class="ui grid">
    <!-- menu -->
    <div class="four wide column computer only">
        <div class="ui secondary vertical pointing menu">
            <a class="item" href="{{ url('/admin') }}">
                學員
            </a>
            <a class="active item" href="{{ url('/admin/attend') }}">
                出席
            </a>
            <a class="item" href="{{ url('/admin/attend') }}">
                保險冊
            </a>
        </div>
    </div>

    <div class="twelve wide column computer only">

        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="first">描述</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <form action="" class="ui form" method="post">
                {{ csrf_field() }}

                <div class="field">
                    <label>標題</label>
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
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="0" class="hidden">
                                        <label>出席</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="1" class="hidden">
                                        <label>遲到</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="2" class="hidden">
                                        <label>早退</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="3" class="hidden">
                                        <label>未到</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @php (++$index)
                    @endforeach
                    </tbody>
                </table>

                <input class="ui primary button fluid" type="submit" value="新增點名單">
            </form>
        </div>
    </div>


    <!-- mobile -->
    <div class="sixteen wide column mobile only">

        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="first">描述</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <form action="" class="ui form" method="post">
                {{ csrf_field() }}

                <div class="field">
                    <label>標題</label>
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
                                    <i class="user icon"></i> {{ $users->class_id }}<br />
                                    <i class="birthday icon"></i> {{ $users->numbers }}<br />
                                    <i class="hashtag icon"></i> {{ $users->firstname }}<br />
                                </div><hr>
                                <div class="inline field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="0" class="hidden">
                                        <label>出席</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="1" class="hidden">
                                        <label>遲到</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="2" class="hidden">
                                        <label>早退</label>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="record[{{ $index }}]" value="3" class="hidden">
                                        <label>未到</label>
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

</div>

<script>
    $('.menu .item').tab();
    $('.ui.checkbox').checkbox();
</script>

@endsection
