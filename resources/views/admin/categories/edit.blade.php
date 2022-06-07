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
                            <label for="name_en">English Name</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en"
                                placeholder="Economy" value="{{ old('name_en', $category->name_en) }}">
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="name_ar">Arabic Name</label>
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar"
                                placeholder="Economy" value="{{ old('name_ar', $category->name_ar) }}">
                            @error('name_ar')
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
