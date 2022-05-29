@extends('layouts.app')

@section('title', 'Edit category')

@section('content')
    <section class="section py-10" style="padding-bottom: 50px">
        <div class="container my-5">
            <form action="{{ route('admin.categories.update' ,$category) }}" method="POST">
                @csrf
                 @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Economy" value="{{ old('name', $category->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">person</span>
                                </div>
                                <input name="capacity" id="capacity" type="number" min="2"
                                    class="form-control @error('capacity') is-invalid @enderror"
                                    value="{{ old('capacity', $category->capacity) }}">
                            </div>

                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn" style="background-color: #F36B2A; color:white;">Submit</button>
            </form>
        </div>
    </section>
@endsection
