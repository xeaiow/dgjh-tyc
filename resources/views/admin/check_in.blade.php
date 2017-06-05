@extends('layout.main')

@section('content')

        <div class="sixteen wide column">
            <table class="ui unstackable table attached segment">
                <thead>
                    <tr>
                        <td>班級</td>
                        <td>座號</td>
                        <td>姓名</td>
                        <td>出席</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($info as $user)
                    <tr>
                        <td>{{ $user->class_id }}</td>
                        <td>{{ $user->numbers }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td><input type="checkbox" value="1"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="ui bottom attached button primary">送出</div>
        </div>
    </div>

@endsection
