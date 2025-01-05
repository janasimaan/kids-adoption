@extends('Layouts.app')


@section('pageTitle')
    {{config('app.name')}}
@endsection


<body>
<section class="container mt-5">
    <h3>Welcome And Thank You For Visiting US</h3>
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
        @foreach($kids as $kid)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$kid->first_name}} {{$kid->last_name}}</h5>
                        <h6>Age : {{$kid->age->format('d/m/Y')}}</h6>
                        <h6>
                            Status :
                            @if($kid->status == 0)
                                Adopted
                            @else
                                Not Adopted
                            @endif
                        </h6>
                        <p class="card-text">Description : {{$kid->desc}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('donate',$kid->id)}}" class="btn btn-success float-end">Donate</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
</body>




