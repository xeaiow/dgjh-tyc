@extends('layout.main')

@section('content')

<div class="ui grid">

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

        <h2 class="ui header">參加人數：{{ $join }} 人</h2>
        <h2 class="ui header">表演人數：{{ ($join-$teacher) }} 人</h2>
        <h2 class="ui header">素食主義者：{{ count($vegetarianism) }} 人
        </h2>
        @foreach($vegetarianism as $members)
            <label class="ui label blue">{{ $members }}</label>
        @endforeach

    </div>

</div>

@endsection
