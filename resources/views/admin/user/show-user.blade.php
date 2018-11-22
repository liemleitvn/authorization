@extends('layouts.app')
@section('content')

    {{--Start form show user--}}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col" style="width: 10%">#</th>
                    <th scope="col" style="width: 20%">Name</th>
                    <th scope="col" style="width: 30%">Email</th>
                    <th scope="col" style="width: 10%">Role</th>
                    <th class="text-center" scope="col" style="width: 15%">Edit</th>
                    <th class="text-center" scope="col" style="width: 15%">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    @if($user->email == 'admin@authorization.local')
                        @continue
                    @endif
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->role }}</td>
                        <td class="action-edit text-center" scope="col">
                            <a
                                    data-toggle="tooltip" data-placement="top" title="Edit user"
                                    href="{{ route('admin.user.edit', ['as'=>$user->id]) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                        <td class="action-delete text-center" scope="col">
                            <a
                                    data-toggle="tooltip" data-placement="top" title="Delete user"
                                    href="{{ route('admin.user.delete', ['as'=>$user->id]) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
    {{--End form show user--}}
@endsection