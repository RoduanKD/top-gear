@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <section class="section layout_padding">
        <div class="container">
            <h1>Received Categories</h1>
            <div class="float-right">
                <form action="{{ route('admin.categories.create') }}" method="GET"> @csrf <button class="btn btn-success"
                        type="submit" value="add">Add</button> </form>
            </div><br><br>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>cars count</th>
                    <th>capacity</th>
                    <th colspan="2">action</th>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td><a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a></td>
                            <td><a
                                    href="{{ route('admin.categories.show', $category) }}">{{ $category->cars->count() }}</a>
                            </td>
                            <td>{{ $category->capacity }}</td>
                            <td class="text-center row">
                                <div class="btn-group" role="group">
                                    <div class="col-md-6 padding-right: 5px padding-left: 5px;">
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                                    </div>
                                    <div class="col-md-6 padding-right: 5px padding-left: 5px;">
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" value="delete"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div>
                            <span style="color: red">There are no categories now,</span> <a
                                href="{{ route('admin.categories.create') }}" style="font-weight: bold">please create
                                one</a>!
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
