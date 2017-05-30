@extends('layout.main')

@section('content')

<div class="ui grid">

    <div class="sixteen wide column">
        <button class="ui icon button brown"><i class="plus icon"></i> 點名</button>
    </div>

    <div class="sixteen wide column">
        <div class="ui cards">

            @foreach($user as $info)
                <div class="card">
                    <div class="content">
                        <div class="header right floated">
                            <a class="ui basic label red" href="{{ url('/admin/attend/'.$info->id.'') }}"><i class="user icon"></i>18/20</a>
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

</div>

@endsection
