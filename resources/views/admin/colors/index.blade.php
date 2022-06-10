@extends('layouts.app')

@section('title','Colors')

@section('content')
    <section class="section layout_padding">
        <div class="container">
            <h4>Colors Table :</h4>
            <div class="btn float-right"><a href="{{ route('admin.colors.create') }}"><button class="btn btn-sm btn-success">Add</button></a></div>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ( $colors as $color )
                        <tr>
                            <td>{{ $color->name }}</td>
                            <td>
                                <div class="col-md-6 padding-right: 5px padding-left: 5px;">
                                    <form action="{{ route('admin.colors.destroy', $color) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" value="delete" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <div class="col">
                        There are no colors now, <a href="{{ route('admin.colors.create') }}">please create one</a>!
                    </div>
                    @endforelse
                </tbody>
            </table>





        </div>
    </section>
    @endsection
