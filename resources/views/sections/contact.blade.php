<!-- section -->
<section id="contact" class="dark_bg_blue layout_padding cross_layout padding_top_0 margin_top_0">
    <div class="container">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <div class="row">
            <div class="col-md-12">
                <div class="full center">
                    <h2 class="heading_main orange_heading">Contact Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="full">
                    <div class="contact_form">
                        <form action="{{route('contact')}}" method="POST">
                            @csrf
                            <fieldset class="row">
                                <div class="col-md-12">
                                    <div class="full field">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Your Name" name="name" value="{{ old('name') }}" />

                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="full field">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="full field">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Phone" name="phone" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="full field">
                                        <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Message"
                                            name="content">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="full center">
                                        <button class="submit_bt">Send</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="full map_section">
                    <div id="map">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- end section -->
