<footer class="footer bg-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                    <div class="widget">
                        <h4 class="widget-title">About Us</h4>
                        <img src="{{ asset('frontend/assets/images/logo-footer.png') }}" alt="Logo" class="m-b-3">
                        <p class="m-b-4 pb-1">Porto eCommerce, the largest eCommerce site in Bangladesh. Reliable, Fast,
                            and Genuine products guarantee from the root company.</p>
                        <a href="#" class="btn btn-outline-dark btn-sm">Read More</a>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                    <div class="widget mb-2">
                        <h4 class="widget-title mb-1 pb-1">Contact Info</h4>
                        <ul class="contact-info m-b-4">
                            <li>
                                <span class="contact-info-label">Address:</span>Road: 12, Lane: 2, Mirpur, Dhaka
                            </li>
                            <li>
                                <span class="contact-info-label">Phone:</span><a href="tel:">01721850242</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Email:</span> <a
                                    href="mailto:mail@example.com">info@example.com</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Working Days/Hours:</span>
                                24/7 Hours
                            </li>
                        </ul>
                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                title="Linkedin"></a>
                        </div><!-- End .social-icons -->
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                    <div class="widget">
                        <h4 class="widget-title pb-1">Customer Service</h4>

                        <ul class="links">
                            <li><a href="#">Help & FAQs</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="{{ route('customer.checkout') }}">Shipping & Delivery</a></li>
                            <li><a href="">Orders History</a></li>
                            <li><a href="#">Advanced Search</a></li>
                            <li><a href="{{ route('customer.myaccount') }}">My Account</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="#">Corporate Sales</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-5 pb-sm-0">
                    <div class="widget">
                        <h4 class="widget-title">Popular Tags</h4>

                        <div class="tagcloud">
                            <a href="#">Bag</a>
                            <a href="#">Black</a>
                            <a href="#">Blue</a>
                            <a href="#">Clothes</a>
                            <a href="#">Fashion</a>
                            <a href="#">Hub</a>
                            <a href="#">Jean</a>
                            <a href="#">Shirt</a>
                            <a href="#">Skirt</a>
                            <a href="#">Sports</a>
                            <a href="#">Sweater</a>
                            <a href="#">Winter</a>
                        </div>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
            <p class="footer-copyright py-3 pr-4 mb-0">Â© Porto eCommerce. 2020. All Rights Reserved</p>

            <img src="{{ asset('frontend/assets/images/payments.png') }}" alt="payment methods"
                class="footer-payments py-3">
        </div>
    </div><!-- End .container -->
</footer><!-- End .footer -->
