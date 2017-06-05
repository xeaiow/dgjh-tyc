@extends('layout.main')

@section('content')

    <!-- computer -->
    <div class="twelve wide column computer only">

        <div class="ui segment basic right aligned">
            <button class="ui icon button orange" onclick="window.location.href='{{ url('/admin/'.$user->id.'/remove/') }}'"><i class="delete icon"></i></button>
        </div>

        <form action="" class="ui form" method="post">
            {{ csrf_field() }}
            <div class="field">
                <label>班級</label>
                <input type="text" name="class_id" value="{{ $user->class_id }}">
            </div>
            @if ( $errors->first('class_id') )
                <!-- 班級錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('class_id') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>座號</label>
                <input type="text" name="numbers" value="{{ $user->numbers }}">
            </div>
            @if ( $errors->first('numbers') )
                <!-- 座號錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('numbers') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>姓名</label>
                <input type="text" name="firstname" value="{{ $user->firstname }}">
            </div>
            @if ( $errors->first('firstname') )
                <!-- 姓名錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('firstname') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>生日</label>
                <input type="text" name="birthday" value="{{ $user->birthday }}">
            </div>
            @if ( $errors->first('birthday') )
                <!-- 生日錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('birthday') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>監護人</label>
                <input type="text" name="guardian" value="{{ $user->guardian }}">
            </div>
            @if ( $errors->first('guardian') )
                <!-- 監護人錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('guardian') }}！
                    </div>
                </div>
            @endif
            <input class="ui button primary fluid" type="submit" value="編輯">
        </form>
    </div>

    <!-- mobile -->
    <div class="sixteen wide column mobile only">

        <form action="" class="ui form" method="post">
            {{ csrf_field() }}
            <div class="field">
                <label>班級</label>
                <input type="text" name="class_id" value="{{ $user->class_id }}">
            </div>
            @if ( $errors->first('class_id') )
                <!-- 班級錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('class_id') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>座號</label>
                <input type="text" name="numbers" value="{{ $user->numbers }}">
            </div>
            @if ( $errors->first('numbers') )
                <!-- 座號錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('numbers') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>姓名</label>
                <input type="text" name="firstname" value="{{ $user->firstname }}">
            </div>
            @if ( $errors->first('firstname') )
                <!-- 姓名錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('firstname') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>生日</label>
                <input type="text" name="birthday" value="{{ $user->birthday }}">
            </div>
            @if ( $errors->first('birthday') )
                <!-- 生日錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('birthday') }}！
                    </div>
                </div>
            @endif

            <div class="field">
                <label>監護人</label>
                <input type="text" name="guardian" value="{{ $user->guardian }}">
            </div>
            @if ( $errors->first('guardian') )
                <!-- 監護人錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('guardian') }}！
                    </div>
                </div>
            @endif
        </form>
        <div class="ui two bottom attached buttons">
            <input class="ui button primary" type="submit" value="編輯">
            <button class="ui button red" onclick="window.location.href='{{ url('/admin/'.$user->id.'/remove/') }}'">刪除</button>
        </div>

    </div>



@endsection
