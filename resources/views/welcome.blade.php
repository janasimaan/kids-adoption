@extends('Layouts.app')


@section('pageTitle')
    {{config('app.name')}} | Welcome Page
@endsection


<body>

<section class="container text-center mt-5">
    <h3>Welcome To Our Website</h3>
    <img src="https://donorbox.org/nonprofit-blog/wp-content/uploads/2018/02/how-to-get-donations.jpg" alt="">
    <h3 class="mt-5">About Us</h3>
    <p>
        This association is a platform that allows people to donate money to children who need financial help, <br> no
        money will be distributed to adopters or their families, the money will be translated into distribution for
        certain materials.
        <p>you can contact us by our email: kidsAdoption@gmail.com</p>
    </p>
    <a href="{{route('index')}}" class="btn btn-primary w-50">Donate Now</a>
    <a href="{{route('login')}}" class="btn btn-dark w-25">Admin</a>
</section>
</body>




