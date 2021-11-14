@extends('layouts.layout')

@section('content')

<div class="common-banner">
    <div class="content">
        <div class="primary-title">Contact Us</div>
    </div>
</div>

<div class="contact-us">
    <div class="container">
        <div class="contact-info">
            <div class="location">
                <div><i aria-hidden="true" class="fas fa-map-marker-alt"></i></div>
                <h4>OUR LOCATION</h4>
                <p>2020 Willshire Glen,</p>
                <p>Alpharetta, GA-30009</p>
            </div>
            <div class="phone-number">
                <div><i aria-hidden="true" class="fas fa-phone"></i></div>
                <h4>PHONE NUMBER</h4>
                <p>+88 0125 3698 0257</p>
                <p>+66 2548 6987 2548</p>
            </div>
            <div class="opening">
                <div><i aria-hidden="true" class="far fa-envelope"></i></div>
                <h4>OPENNING HOUR</h4>
                <p>Sat - Mon - 10 to 14</p>
                <p>Mon - Thu - 14 to 20</p>
            </div>
        </div>
    </div>
</div>

<div class="contact-details">
    <div class="container flex justify-between">
        <div class="contact">
            <h4>Contact Us</h4>
            <form action="">
                <div class="form-group flex justify-between">
                    <div class="name"><input type="text" name="" id="" placeholder="Your Name"></div>
                    <div class="mail"><input type="email" name="" id="" placeholder="Your Mail"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="" id="" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea placeholder="Your Message..."></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Send a message">
                </div>
            </form>
        </div>
        <div class="map">
            <h4>Our Location</h4>
            <div class="map-location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52655.40005389389!2d35.810805129106946!3d34.427707557225865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1521f6ab9db89d33%3A0x323c52527dde8578!2sTripoli!5e0!3m2!1sen!2slb!4v1636377373329!5m2!1sen!2slb" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection