@extends('layouts.app')
@section('content')
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-3">
        <div class="container">
            <p>
                <span style="font-size: 25px">User Matrix</span>
                Users that are on each role
            </p>
        </div>
        <form method="post" action="{{route('admin.roles.set-role-user', ['id'=>$roles->id])}}">
            @csrf
            <table class="table table-striped table-bordered container">
                <thead>
                <tr>
                    <th style="width: 70%">#</th>
                    <th style="text-align: center">{{ $roles->role }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                        @if($user->email == 'admin@authorization.local')
                            @continue
                        @endif
                        <tr>
                            <td>{{$user->name}}/{{$user->email}}</td>
                            <td>
                                <input
                                        type="checkbox"
                                        value="{{$user->id}}-{{$roles->id}}"
                                        {{$user->role_id == $roles->id? 'checked':''}}
                                        name="user-role-{{ $roles->id }}"
                                >
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{--@for($j = 0; $j <= count($users); $j++)--}}
                {{--<tr>--}}
                {{--@for($i = 0; $i <= count($roles); $i++)--}}
                {{--@if($users[$j-1]['role_id']==6|| $users[$j-1]['email'] == 'admin@authorization.local')--}}
                {{--@continue--}}
                {{--@endif--}}
                {{--@if($i == 0 && $j==0)--}}
                {{--<th class="table-warning" scope="col">#</th>--}}
                {{--@elseif($i == 0 && $j != 0)--}}
                {{--<th class="table-warning" scope="col">--}}
                {{--{{ $users[$j-1]['name'].'/'.$users[$j-1]['email'] }}--}}
                {{--</th>--}}
                {{--@elseif($j == 0 && $i !=0)--}}
                {{--<th class="table-warning" scope="col" style="text-align: center; width: 15%">{{ $roles[$i-1]['role'] }}</th>--}}
                {{--@else--}}
                {{--<td style="text-align: center">--}}
                {{--<label>--}}
                {{--<input--}}
                {{--type="radio"--}}
                {{--value="{{ $users[$j-1]['id'] }}-{{ $roles[$i-1]['id'] }}"--}}
                {{--class="user-role-{{$users[$j-1]['id']}}"--}}
                {{--name="user-role-{{$users[$j-1]['id']}}"--}}
                {{--{{$users[$j-1]['role_id'] == $roles[$i-1]['id']? 'checked':''}}--}}
                {{-->--}}
                {{--</label>--}}
                {{--</td>--}}
                {{--@endif--}}
                {{--@endfor--}}
                {{--</tr>--}}
                {{--@endfor--}}
            </table>
            <div class="container">
                {!! $users->links() !!}
                <button type="submit" style="cursor: pointer">Save</button>
            </div>
        </form>
    </div>
@endsection