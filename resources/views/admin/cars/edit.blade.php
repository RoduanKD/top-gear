@extends('layouts.app')

@section('title', 'Edit car | ' . $car->brand . ' ' . $car->model)

@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" @endpush
    @push('js') <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 100
            });
        });
    </script> @endpush
    @section('content') <section class="section py-10" style="padding-bottom: 50px">
    <div class="container">
        <form action="{{ route('admin.cars.update', $car) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                            name="brand" placeholder="Audi" value="{{ old('brand', $car->brand) }}">
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                            name="model" placeholder="A4" value="{{ old('model', $car->model) }}">
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
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
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Car category</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $car->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }} ({{ $category->capacity }})</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
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
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input name="year" id="year" type="number" min="1880"
                            class="form-control @error('year') is-invalid @enderror"
                            value="{{ old('year', $car->year) }}">
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                            name="country" placeholder="Germany" value="{{ old('country', $car->country) }}">
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Car colors</label>
                        <select multiple name="colors[]" class="form-control @error('colors') is-invalid @enderror">
                            @foreach ($colors as $color)
                                <option value={{ $color->id }}
                                    {{ $car->colors->contains($color) ? 'selected' : '' }}>
                                    {{ $color->name }}</option>
                            @endforeach
                        </select>
                        @error('colors')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($car->getMedia() as $media)
                    <div class="col-md-3">
                        <img src="{{ $media->getUrl() }}" alt="" width="100%">
                        <form action="{{ route('admin.media.destroy', $media) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="form-check pb-5">
                <input name="is_new" type="checkbox" class="form-check-input @error('is_new') is-invalid @enderror"
                    id="is_new" value="1" {{ old('is_new', $car->is_new == 'yes') ? 'checked' : '' }}>
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
