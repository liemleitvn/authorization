@extends('layouts.app')
@section('content')
    {{--Show error if error validate--}}
    @if ($errors->any())
        <div class="alert alert-danger container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--end show error validate--}}

    {{--Start show result create, update, delete role--}}
    @if($resultInserting = Session::get('resultInserting'))
        <p class="alert alert-success alert-block container">Insert successful role {{ $resultInserting->role }}</p>
    @endif
    {{--End show result--}}

    {{--Button Insert role--}}
    <div class="container">
        <button
                style="float: right"
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#modal-insert-role"
        >
            Add Role
        </button>

    </div>
    {{--End button insert role--}}

    {{--Modal insert role--}}
    <div class="modal fade" id="modal-insert-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Insert role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('roles.insert') }}">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="role">Role name</label>
                            <input type="text" id="role" name="role" class="form-control validate" placeholder="Entry role" value="{{ old('role') }}">
                        </div>

                        <div class="md-form mb-4">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="role-description">Description</label>
                            <input type="text" class="form-control validate" id="description" placeholder="Describe role" name="description" value="{{ old('role') }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="insert-role">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--End modal insert role--}}

    {{--Show Roles--}}
    @if(isset($roles))
        <div class="container">
            <div class="panel panel-success">
                <div class="panel-heading">Posts List</div>
                <table class="table table-hover">
                    <tr >
                        <th width="10%">#</th>
                        <th width="30%">Name</th>
                        <th>Description</th>
                        <th width="30%">Action</th>
                    </tr>
					<?php $index = 1 ?>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $role['role'] }}</td>
                            <td>{{ $role['description'] }}</td>
                            <td>
                                <button class="btn btn-warning">
                                    <a style="text-decoration: none" href="{{ url('roles/update/'.$role['id']) }}">Edit</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a style="text-decoration: none" href="{{ url('post/delete/'.$role['id']) }}">Delete</a>
                                </button>
                            </td>
                        </tr>
						<?php $index++ ?>
                    @endforeach
                </table>
            </div>
        </div>
    @else
        <table>
            <tr>
                <td class="text-center">0</td>
                <td>Title</td>
                <td>No Content</td>
                <td class="text-center">Default</td>
                <td class="text-center">Default</td>
                <td></td>
            </tr>;
        </table>
    @endif
    {{--End show roles--}}

@endsection