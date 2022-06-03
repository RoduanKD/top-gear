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
                            <form class="form" action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                        placeholder="Someone@topgear.test" value="{{ old('email', 'admin@topgear.test') }}" required>
                                    @error('email')
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
