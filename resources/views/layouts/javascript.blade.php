<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

<!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#choseCategories-1 a').on('click', function () {
                var id= ($(this).data('value'));
                window.location.href = "/shop/"+id+"";
            });
            $('#choseCategories-2 a').on('click', function () {
                var id= ($(this).data('value'));
                window.location.href = "/shop/"+id+"";
            });
        });
        
       
    </script>
@yield('javascript')