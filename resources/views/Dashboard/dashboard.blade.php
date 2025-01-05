@extends('Layouts.app')


@section('pageTitle')
    {{config('app.name')}}
    | Dashboard
@endsection


<body>
<section class="container mt-5">
    <div class="float-end">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    <h3>Hello</h3>
    <h5 class="text-success">Total Of Donations For Now Is : {{$donations->sum('amount')}} ₪</h5>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add kid
                </div>
                <div class="card-body">
                    <form action="{{route('kids.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Id Number </label>
                            <input type="number" name="id_number" class="form-control" placeholder="Id Number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="0">Adopted</option>
                                <option value="1">Not Adopted</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="date" name="age" class="form-control" placeholder="Age" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description (Not Required)</label>
                            <textarea name="desc" class="form-control" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id Number</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($kids as $kid)
                    <tr>
                        <th scope="row">{{$kid->id_number}}</th>
                        <td>{{$kid->first_name}} {{$kid->last_name}}</td>
                        <td>
                            @if($kid->status == 0)
                                Adopted
                            @else
                                Not Adopted
                            @endif
                        </td>
                        <td>
                            <a href="{{route('kid',$kid->id)}}" class="btn btn-warning">View More</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</body>




