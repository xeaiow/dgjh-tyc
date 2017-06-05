@extends('layout.not_menu_main')

@section('content')

    <div class="sixteen wide column computer only">

        <table class="ui celled table">
            <thead>
                <tr class="center aligned">
                    <th>編號</th>
                    <th>班級</th>
                    <th>姓名</th>
                    <th>出生年月日</th>
                    <th>身分證字號</th>
                    <th>監護人</th>
                    <th>素食</th>
                </tr>
            </thead>
            <tbody>
                <?php $join = 0; $teacher = 0; $vegetarianism = []; ?>
                @php ($gg=0)
                @foreach($info as $insurance)

                    @php
                        if($insurance->status == 2) {
                            $teacher++;
                        }
                    @endphp
                    <tr class="center aligned">
                        <td>{{ $join+1 }}</td>
                        <td>{{ $insurance->class_id }}{{ $insurance->numbers }}</td>
                        <td>{{ $insurance->firstname }}</td>
                        <td>{{ $insurance->birthday }}</td>
                        <td>{{ $insurance->identity_id }}</td>
                        <td>{{ $insurance->guardian }}</td>
                        <td>
                            @php
                                if ( $insurance->vegetarianism == 1 ) {
                                    echo "✔";
                                    $vegetarianism[] = $insurance->firstname;
                                }
                            @endphp
                        </td>
                    </tr>
                    @php ($join++)
                @endforeach
            </tbody>
        </table>

        <h4 class="ui horizontal divider header">
            <i class="user icon"></i>
            參加人數：{{ $join }} 人
        </h4>

        <h4 class="ui horizontal divider header">
            <i class="diamond icon"></i>
            表演人數：{{ $join-$teacher }} 人
        </h4>

        <h4 class="ui horizontal divider header">
            <i class="tree icon"></i>
            素食主義：{{ count($vegetarianism) }} 人
        </h4>
        @foreach($vegetarianism as $members)
            <label class="ui label blue">{{ $members }}</label>
        @endforeach

    </div>

    <div class="sixteen wide column mobile only">

        <div class="ui cards stackable">

            <?php $join = 0; $teacher = 0; $vegetarianism = []; ?>
            @php ($gg=0)
            @foreach($info as $insurance)

                @php
                    if($insurance->status == 2) {
                        $teacher++;
                    }
                @endphp
                <div class="card">
                    <div class="content fluid">

                        <div class="ui grid">
                            <div class="four wide column mobile only">
                                編號<br />
                                班級<br />
                                姓名<br />
                                生日<br />
                                身分證<br />
                                監護人<br />
                                素食
                            </div>
                            <div class="twelve wide column mobile only">
                                {{ $join+1 }}<br />
                                {{ $insurance->class_id }}{{ $insurance->numbers }}<br />
                                {{ $insurance->firstname }}<br />
                                {{ $insurance->birthday }}<br />
                                {{ $insurance->identity_id }}<br />
                                {{ $insurance->guardian }}<br />
                                @php
                                    if ( $insurance->vegetarianism == 1 ) {
                                        echo "✔";
                                        $vegetarianism[] = $insurance->firstname;
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
                @php ($join++)
            @endforeach
        </div>

        <h4 class="ui horizontal divider header">
            <i class="user icon"></i>
            參加人數：{{ $join }} 人
        </h4>

        <h4 class="ui horizontal divider header">
            <i class="diamond icon"></i>
            表演人數：{{ $join-$teacher }} 人
        </h4>

        <h4 class="ui horizontal divider header">
            <i class="tree icon"></i>
            素食主義：{{ count($vegetarianism) }} 人
        </h4>
        @foreach($vegetarianism as $members)
            <label class="ui label blue">{{ $members }}</label>
        @endforeach
    </div>
</div>

@endsection
