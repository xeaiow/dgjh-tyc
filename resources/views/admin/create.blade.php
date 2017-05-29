@extends('layout.main')

@section('content')

    <form action="" class="ui form" method="post">
        {{ csrf_field() }}

        <div class="field">
            <label>班級</label>
            <input type="text" name="class_id" placeholder="701">
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
            <input type="text" name="numbers">
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
            <input type="text" name="firstname">
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
            <input type="text" name="birthday" placeholder="1995-06-01">
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
            <label>身分證字號</label>
            <input type="text" name="identity_id">
        </div>
        @if ( $errors->first('identity_id') )
            <!-- 身分證字號錯誤訊息 -->
            <div class="ui negative message">
                <div class="header">
                    {{ $errors->first('identity_id') }}！
                </div>
            </div>
        @endif

        <div class="field">
            <label>監護人</label>
            <input type="text" name="guardian">
        </div>
        @if ( $errors->first('guardian') )
            <!-- 監護人錯誤訊息 -->
            <div class="ui negative message">
                <div class="header">
                    {{ $errors->first('guardian') }}！
                </div>
            </div>
        @endif

        <div class="ui one bottom attached buttons">
            <input class="ui button primary" type="submit" value="新增">
        </div>
    </form>

@endsection
