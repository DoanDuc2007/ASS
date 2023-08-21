@extends('layout');
@section('content');
<div class="container">
    <div class="card" style="padding-top: 50px">
        <form action="{{ route('customer.update', $model) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name"
                       value="{{ $model->name }}"
                       placeholder="Enter name"
                       name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email"
                       value="{{ $model->email }}"
                       name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="address">Address:</label>
                <input type="text" class="form-control"
                       value="{{ $model->address }}"
                       id="address" name="address">
            </div>
            <div class="mb-3 mt-3">
                <label for="brand">Decentralization:</label> <br>
                <select class="form-control" aria-label="Default select example"
{{--                        value="{{ $model->address }}"--}}
                        name="decentralization" id="decentralization">
                    <option selected>Open this select menu</option>
                    <option value="{{ $model->address }}">Quản Lý</option>
                    <option value="Nhân Viên">Nhân Viên</option>
                    <option value="Khách Hàng">Khách Hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>

@endsection
