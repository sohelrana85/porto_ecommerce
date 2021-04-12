<div class="container">
    <nav class="main-nav w-100">
        <ul class="menu" style="border-top: 1px solid #eee;">
            <li class="active">
                <a href="{{ route('index') }}">Home</a>
            </li>
            <li>
                <a href="#">Category</a>
                {!! headerCategories($menucategories) !!}
            </li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li class="float-right"><a href="" target="_blank">Buy Porto!<span
                        class="tip tip-new tip-top">New</span></a></li>
            <li class="float-right"><a href="#">Special Offer!</a></li>
        </ul>
    </nav>
</div><!-- End .container -->
