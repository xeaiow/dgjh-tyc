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

        <div class="ui segment basic">
            <a href="{{ url('/admin/attend/create') }}"><button class="ui icon button blue"><i class="plus icon"></i> 點名單</button></a>
        </div>

        <div class="ui segment basic">
            <div class="ui cards">
                @foreach($user as $info)
                    <div class="card">
                        <div class="content">
                            <div class="header right floated">
                                <a class="ui basic label red" href="{{ url('/admin/attend/'.$info->id.'') }}"><i class="user icon"></i> {{ $info->attended }} / {{ $info->quorum }}</a>
                            </div>
                            <div class="header">{{ $info->title }}</div>
                            <div class="description">
                                <p>{{ $info->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="ui segment basic">
            {{ $user->links() }}
        </div>

    </div>

    <div class="sixteen wide column mobile only">

        <div class="ui segment basic">
            <a href="{{ url('/admin/attend/create') }}"><button class="ui icon button blue fluid"><i class="plus icon"></i> 點名</button></a>
        </div>

        <div class="ui cards stackable">
            @foreach($user as $info)
                <div class="card">
                    <div class="content">
                        <div class="header right floated">
                            <a class="ui basic label red" href="{{ url('/admin/attend/'.$info->id.'') }}"><i class="user icon"></i> {{ $info->attended }} / {{ $info->quorum }}</a>
                        </div>
                        <div class="header">{{ $info->title }}</div>
                        <div class="description">
                            <p>{{ $info->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="ui segment basic">
            {{ $user->links() }}
        </div>

    </div>

</div>

@endsection
