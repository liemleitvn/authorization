@extends('layouts.app')
@section('content')
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-3">
        <div class="container">
            @if(isset($error))
                <h4>{{ $error }}</h4>
            @else
                <form method="post" action="{{ route('admin.user.update', ['as'=>$user->id]) }}">
                    @csrf
                    <h4>Here you can see {{$user->name}} account's details</h4>
                    <table class="container">
                        <tr>
                            <th style="width: 20%">ID:</th>
                            <td style="width: 70%;">{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Email verified:</th>
                            <td>{{ $user->email_verified_at }}</td>
                        </tr>
                        <tr>
                            <th>Member since:</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Last Update:</th>
                            <td>{{ $user->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Last Login:</th>
                            <td>???</td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>
                                <select name="role">
                                    @foreach($roles as $key=>$role)
                                        <option
                                                value="{{$role->id}}"
                                                {{ $role->id == $user->role_id? 'selected':'' }}
                                        >
                                            {{ $role->role }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            @endif
        </div>
    </div>
@endsection