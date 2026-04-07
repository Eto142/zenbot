@include('home.header')











<section class="pb-0 pt-8">
    <div class="container">
        <div class="mb-5 mb-md-7">
            <h1 class="h2">This is the best contact us you can get</h1>
            <p class="lead w-md-70 w-lg-60">On the off chance that you'd prefer to know more or have an inquiry, kindly browse the contact alternatives underneath.</p>
        </div>
        <!-- Form -->
        <div class="row">
            <div class="col-md-4 mb-5 mb-md-0">
                <div class="pe-lg-6">
                    <div class="media mb-4 pb-4 border-bottom border-light">
                        <img class="feather display-6" src="assets/img/svg/mail.svg" alt="...">
                        <div class="media-body ms-3">
                            <h4 class="mb-2 h5">Email</h4>
                            <p class="mb-0">addyour@emailhere</p>
                        </div>
                    </div>
                    <div class="media mb-4 pb-4 border-bottom border-light">
                        <img class="feather display-6" src="assets/img/svg/map-pin.svg" alt="...">
                        <div class="media-body ms-3">
                            <h4 class="mb-2 h5">Visit Us</h4>
                            <p class="mb-0 w-lg-90">66 Guild Street 512B, Great North Town.</p>
                        </div>
                    </div>
                    <div class="media">
                        <img class="feather display-6" src="assets/img/svg/phone.svg" alt="...">
                        <div class="media-body ms-3">
                            <h4 class="mb-2 h5">Call Us</h4>
                            <p class="mb-0">(+44) 123 456 789</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <!-- start form here -->

                <form>

                    <div class="row">

                        <!-- Input -->
                        <div class="col-sm-6 mb-3">
                            <label id="name">Your Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Your name here">
                        </div>
                        <!-- End Input -->

                        <!-- Input -->
                        <div class="col-sm-6 mb-3">
                            <label id="email">Your Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Your email here">
                        </div>
                        <!-- End Input -->

                    </div>

                    <div class="row">

                        <!-- Input -->
                        <div class="col-sm-6 mb-3">
                            <label id="companyname">Company Name</label>
                            <input type="text" class="form-control" name="companyname" placeholder="Your company name">
                        </div>
                        <!-- End Input -->

                        <!-- Input -->
                        <div class="col-sm-6 mb-3">
                            <label id="phone">Contact Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="+40-123 456 789">
                        </div>
                        <!-- End Input -->

                    </div>

                    <div class="row">

                        <!-- Input -->
                        <div class="col-12 mb-4">
                            <label id="name1">Message</label>
                            <div class="mb-1">
                                <textarea id="message" rows="4" class="form-control h-100" placeholder="Tell us a few words"></textarea>
                            </div>
                        </div>
                        <!-- End Input -->

                    </div>

                    <!-- Buttons -->
                    <button type="button" class="btn btn-primary btn-md">Send Message</button>

                    <!-- End Buttons -->

                </form>

                <!-- end form here -->

            </div>
        </div>
        <!-- End Form -->

    </div>
</section>

<!-- CONTACT MAP
================================================== -->
<section>
    <div class="container">
        <div>
            <iframe width="100%" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=london&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
        </div>
    </div>
</section>

@include('home.footer')