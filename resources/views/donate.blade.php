@extends('Layouts.app')


@section('pageTitle')
    {{config('app.name')}} | Donate
@endsection

<style>
    #hidden_div {
        display: none;
    }
</style>

<body>
<section class="container mt-5">
    <div class="col-md-4">
        <h3>Donate For {{$kid->first_name}} {{$kid->last_name}}</h3>
        <p>
            Status :
            @if($kid->status == 0)
                Adopted
            @else
                Not Adopted
            @endif
            <br>
            Age : {{$kid->age->format('d/m/Y')}}
        </p>
        <form action="{{route('send_donation',$kid->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Your Name (Not Required)</label>
                <input type="text" name="name" class="form-control" placeholder="Your Name">
            </div>
            <div class="mb-3">
                <label class="form-label text-success">Amount (₪)</label>
                <input type="number" name="amount" class="form-control" placeholder="Amount" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Type Of Donation</label>
                <select class="form-select" name="type" onchange="showDiv('hidden_div', this)" required>
                    <option value="Single Donation">Single Donation</option>
                    <option value="Donation For Six Months">Donation For Six Months</option>
                    <option value="Donation For One Year (12 Months)">Donation For One Year (12 Months)</option>
                    <option value="Monthly Amount At Specific Age">Monthly Amount At Specific Age</option>
                </select>
            </div>
            <div id="hidden_div" class="mb-3">
                <label class="form-label">Age</label>
                <select class="form-select" name="age">
                    <option value="">Select</option>
                    <option value="18">18</option>
                    <option value="21">21</option>
                    <option value="23">23</option>
                </select>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name on card</label>
                    <input type="text" class="form-control" placeholder="" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                        Name on card is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Credit card number</label>
                    <input type="text" class="form-control" placeholder="" required>
                    <div class="invalid-feedback">
                        Credit card number is required
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Expiration</label>
                    <input type="text" class="form-control" placeholder="" required>
                    <div class="invalid-feedback">
                        Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label>CVV</label>
                    <input type="text" class="form-control" placeholder="" required>
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100">Donate</button>
            <a href="{{route('index')}}" class="btn btn-dark w-100 mt-2">Return To Main Page</a>
        </form>
    </div>
</section>

<script>
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value === 'Monthly Amount At Specific Age' ? 'block' : 'none';
    }
</script>
</body>




