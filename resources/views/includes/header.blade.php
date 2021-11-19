<header>
    <div class="container flex justify-between">
        <div class="logo"><a href="{{route('home')}}">LOGO HERE</a></div>
        <div class="mobile-menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <nav>
            <ul class="flex">
                <li><a href="{{route('home')}}">home</a></li>
                <li><a href="{{route('shop')}}">shop</a></li>
                <li><a href="{{route('contact-us')}}">contact us</a></li>
            </ul>
        </nav>

    </div>

    <script>
        $(document).ready(function(){
            $('.mobile-menu-icon').click(function(){
                $('header nav').toggleClass('active-menu');
                $('.mobile-menu-icon i').toggleClass('w-color');
            });
        })
    </script>


</header>