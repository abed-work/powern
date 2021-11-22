<div id="footer">
    <div class="container flex justify-between">
        <div class="col">
            <img src="{{asset('assets/images/logo.png')}}" alt="" height="100px">
        </div>
        <div class="col">
            <h4>QUICK LINKS</h4>
            <ul>
                <li><a href="{{route('home')}}">home</a></li>
                <li><a href="{{route('shop')}}">products</a></li>
                <li><a href="{{route('contact-us')}}">contact us</a></li>
            </ul>
        </div>
        <div class="col">
            <h4>Follow Us</h4>
            <div class="social-media flex">
                @if ($settings[0]->value)
                    <div class="facebook"><a target="_blank" href="{{$settings[0]->value}}"><i class="fab fa-facebook"></i></a></div>
                @endif
                @if ($settings[1]->value)
                    <div class="instagram"><a target="_blank" href="{{$settings[1]->value}}"><i class="fab fa-instagram"></i></a></div>                    
                @endif
            </div>
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            Copyright © PowerN All Right Reserved.
        </div>
    </div>
</div>