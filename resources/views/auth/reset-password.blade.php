@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <section class="section layout_padding">
        <div class="container">
            <div class="row center">
                <div class="col-md-8">
                    <div class="card">
                        <h1 class="card-header">
                            Forgot Password
                        </h1>
                        <div class="card-body">
                          <div class="card-text">
                            <form class="form" action="{{ route('login') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                        placeholder="Someone@topgear.test" value="{{ old('email', 'admin@topgear.test') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                        placeholder="********" value="{{ old('password', 'password') }}" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                                        placeholder="********" value="{{ old('password_confirmation', 'password') }}" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn" style="background-color: #F36B2A; color:white;">Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection
