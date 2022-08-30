<script src="{{ asset('template/united-nation/assets/library/jQuery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('template/united-nation/assets/library/OwlCarousel2-2.3.4/js/owl.carousel.js') }}"></script>
<script src="{{ asset('template/united-nation/assets/library/aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('template/united-nation/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/united-nation/assets/script/script.js') }}"></script>
<script>
    AOS.init();
</script>
<script type="text/javascript">
    function actionToggle() {
        var action = document.querySelector('.action');
        action.classList.toggle('active')
    }

    var action = document.querySelector('.action');
    window.onscroll = function(){
        action.classList.toggle('show', window.scrollY >= 600);
    }
</script>
