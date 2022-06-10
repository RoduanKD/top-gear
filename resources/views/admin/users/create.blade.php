@extends('layouts.app')

@section('title', 'create User')

@section('content')
    <section class="section py-10" style="padding-bottom: 50px">
        <div class="container my-5">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Economy" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email :</span>
                                </div>
                                <input name="email" id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                            </div>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password">password :</label>
                            <div class="input-group">
                                <input name="password" id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}">
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                                placeholder="********" value="{{ old('password_confirmation') }}" required>
                            @error('password_confirmation')
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
