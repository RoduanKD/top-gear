@extends('layouts.app');

@section('title', 'Cars');

@section('content')
    <section class="section layout_padding">
        <div class="container">
            <h1>All Cars</h1>
            <div class="float-right">
                <form action="{{ route('admin.cars.create') }}" method="GET"> @csrf <button class="btn btn-success "
                        type="submit" value="add">Add</button> </form>
            </div>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>brand</th>
                    <th>model</th>
                    <th>colors</th>
                    <th>gear_type</th>
                    <th>year</th>
                    <th>country</th>
                    <th>is_new</th>
                    <th colspan="2">action</th>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->brand }}</td>
                            <td><a href="{{ route('admin.cars.show', $car->id) }}">{{ $car->model }}</a></td>
                            <td>{{ $car->colors }}</td>
                            <td>{{ $car->gear_type }}</td>
                            <td>{{ $car->year }}</td>
                            <td>{{ $car->country }}</td>
                            <td>{{ $car->is_new }}</td>
                            <td>
                                <form action="{{ route('admin.cars.edit', $car) }}" method="GET"> @csrf <button
                                        class="btn btn-warning " type="submit" value="edit">edit</button> </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.cars.destroy', $car) }}" method="POST"> @csrf @method('DELETE')
                                    <button class="btn btn-danger " type="submit" value="delete">delete</button> </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
