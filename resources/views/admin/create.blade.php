@extends('layout.main')

@section('content')

    <div class="twelve wide column computer only">
        <form action="" class="ui form" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label>班級</label>
                <input type="text" name="class_id">
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

            <h4 class="ui horizontal divider header">
                <i class="tree icon"></i>
                素食主義
            </h4>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" name="vegetarianism" value="1" class="hidden">
                    <label>是</label>
                </div>
            </div>
            @if ( $errors->first('vegetarianism') )
                <!-- 素食主義錯誤訊息 -->
                <div class="ui negative message">
                    <div class="header">
                        {{ $errors->first('vegetarianism') }}！
                    </div>
                </div>
            @endif

            <div class="ui one bottom attached buttons">
                <input class="ui button primary" type="submit" value="新增">
            </div>
        </form>
    </div>

    <script>
        $('.menu .item').tab();
        $('.ui.checkbox').checkbox();
    </script>

@endsection
