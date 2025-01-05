@extends('Layouts.app')


@section('pageTitle')
    {{config('app.name')}}
    | Dashboard
@endsection


<body>
<section class="container mt-5">
    <a href="{{route('dashboard')}}" class="btn btn-dark m-2">Back To Dashboard</a>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{$kid->first_name}} {{$kid->last_name}}
                </div>
                <div class="card-body">
                    <form action="{{route('kids.update',$kid->id)}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" value="{{$kid->first_name}}" class="form-control"
                                   placeholder="First Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" value="{{$kid->last_name}}" class="form-control"
                                   placeholder="Last Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Id Number </label>
                            <input type="number" name="id_number" value="{{$kid->id_number}}" class="form-control"
                                   placeholder="Id Number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                @if($kid->status == 0)
                                    <option value="{{$kid->status}}">Selected - Adopted</option>
                                @else
                                    <option value="{{$kid->status}}">Selected - Not Adopted</option
                                @endif
                                <option value="0">Adopted</option>
                                <option value="1">Not Adopted</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="date" name="age" value="{{$kid->age->format('Y-m-d')}}" class="form-control"
                                   placeholder="Age" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description (Not Required)</label>
                            <textarea name="desc" class="form-control" rows="2">{{$kid->desc}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h4>Donations</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Type Of Donation</th>
                    <th scope="col">Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($donations as $donation)
                    <tr>
                        <th scope="row">{{$donation->created_at->format('d/m/Y')}}</th>
                        <td>{{$donation->type}}</td>
                        <td>
                            <span class="bg-success text-white p-2">
                            {{$donation->amount}} ₪
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</body>




