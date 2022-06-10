@extends('layouts.app')

@section('title', 'Add a new color')

@section('content')
    <section class="section py-10" style="padding-bottom: 50px">
        <div class="container my-5">
            <form action="{{ route('admin.colors.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Color" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $color }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn" style="background-color: #F36B2A; color:white;">Submit</button>
            </form>
        </div>
    </section>
@endsection


