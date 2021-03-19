<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Porto eCommerce | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Bootstrap eCommerce Template">
	<meta name="author" content="SW-THEMES">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/icons/favicon.ico') }}">


	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Open+Sans:300,400,600,700','Poppins:300,400,500,600,700,800', 'Playfair+Display:900' ] }
		};
		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = '{{ asset("frontend/assets/js/webfont.js") }}';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>

	<!-- Plugins CSS File -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
</head>
<body>
	<div class="page-wrapper">

        @include('frontend.components.header')

		<main class="main">
        @yield('content')
		</main><!-- End .main -->

        @include('frontend.components.footer')

	    </div><!-- End .page-wrapper -->

	    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

        @include('frontend.components.mobile-menu')

        <!-- Add Cart Modal -->
        <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body add-cart-box text-center">
                <p>You've just added this product to the<br>cart:</p>
                <h4 id="productTitle"></h4>
                <img src="#" id="productImage" width="100" height="100" alt="adding cart image">
                <div class="btn-actions">
                    <a href="cart.html"><button class="btn-primary">Go to cart page</button></a>
                    <a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
                </div>
            </div>
            </div>
        </div>
        </div>


	    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

        <!-- quickview modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content" id="quickviewcontent">

            </div>
            </div>
        </div>


	<!-- Plugins JS File -->
	<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/plugins.min.js') }}"></script>

	<!-- Main JS File -->

	<script src="{{ asset('frontend/assets/js/main.min.js') }}"></script>
	<script src="{{ asset('frontend/custom.js') }}"></script>
    <script src="{{ asset('frontend/loadmore.js') }}"></script>


</body>
</html>
