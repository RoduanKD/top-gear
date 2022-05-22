@extends('layouts.app')

@section('title', 'Edit car | ' . $car->brand . ' ' . $car->model)

@section('content')
    <section class="section py-10" style="padding-bottom: 50px">
        <div class="container">
            <form action="{{ route('admin.cars.update', $car) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                        placeholder="Audi" value="{{ old('brand', $car->brand) }}">
                    @error('brand')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model"
                        placeholder="A4" value="{{ old('model', $car->model) }}">
                    @error('model')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Car category</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $car->category_id) == $category->id ? 'selected':'' }}>{{ $category->name }} ({{ $category->capacity }})</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">SYP</span>
                        </div>
                        <input name="price" id="price" type="number" min="10000000" step="500000"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', $car->price, 25000000) }}">
                    </div>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Car colors</label>
                    <select name="colors" class="form-control @error('colors') is-invalid @enderror" multiple>
                        <option value="black" selected>Black</option>
                    </select>
                    @error('colors')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Gear Type</label>
                    <select name="gear_type" class="form-control @error('gear_type') is-invalid @enderror">
                        <option value="auto">Automatic</option>
                        <option value="manual">Manual</option>
                    </select>
                    @error('gear_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <input name="year" id="year" type="number" min="1880"
                        class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $car->year) }}">
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                        name="country" placeholder="Germany" value="{{ old('country', $car->country) }}">
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check">
                    <input name="is_new" type="checkbox" class="form-check-input @error('is_new') is-invalid @enderror"
                        id="is_new" value="1">
                    <label class="form-check-label" for="is_new">This is a new car?</label>
                    @error('is_new')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        rows="5">{{ old('description', $car->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection
