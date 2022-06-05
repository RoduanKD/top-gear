@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Users</h1>
        <div class="lead">
            Manage your users here.
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm float-right">Add new user</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">#</th>
                    <th scope="col" width="15%">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.users.show', $user) }}" method="GET"> @csrf
                                <button class="btn btn-warning btn-sm" type="submit">Show</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.users.edit', $user) }}" method="PUT"> @csrf
                                <button class="btn btn-info btn-sm" type="submit">Edit</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">
                                DELETE
                            </button>

                            <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete This User
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure that you want to Delete This User!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="col">
                        There are no Users, <a href="{{ route('admin.users.create') }}">please add one</a>!
                    </div>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex">
            {!! $users->links() !!}
        </div>

    </div>
@endsection
