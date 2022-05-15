

    <!-- section -->
    <section id="contact" class="dark_bg_blue layout_padding cross_layout padding_top_0 margin_top_0">
        <div class="container">
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
                            <form action="/contact-us" method="POST">
                                @csrf
                                <fieldset class="row">
                                    <div class="col-md-12">
                                        <div class="full field">
                                            <input type="text" placeholder="Your Name" name="name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="full field">
                                            <input type="email" placeholder="Email" name="email" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="full field">
                                            <input type="text" placeholder="Phone" name="phone" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="full field">
                                            <textarea placeholder="Message" name="content"></textarea>
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
