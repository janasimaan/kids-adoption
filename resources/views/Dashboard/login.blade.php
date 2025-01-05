@extends('Layouts.app')


@section('pageTitle')
    {{config('app.name')}}
    | Login
@endsection


<body>
<section class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-4">
            <form action="{{route('submit_login')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </form>
        </div>
    </div>
</section>
</body>




