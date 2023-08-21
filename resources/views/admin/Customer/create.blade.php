@extends('layout');
@section('content');
<div class="container">
    <div class="card" style="padding-top: 50px">
        <form action=" {{ route('customer.store') }}" method="post"  enctype="multipart/form-data">
            @csrf

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3 mt-3">
                <label for="brand">Decentralization:</label> <br>
                <select class="form-control" aria-label="Default select example" name="decentralization" id="decentralization">
                    <option selected>Open this select menu</option>
                    <option value="Quản Lý">Quản Lý</option>
                    <option value="Nhân Viên">Nhân Viên</option>
                    <option value="Khách Hàng">Khách Hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>

@endsection
