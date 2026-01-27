@extends('adminlte::page')

@section('title', 'View Order')

@section('content_header')
    <h1>Order #{{ $order->id }}</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <p><strong>User:</strong> {{ $order->user->name ?? '' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

        <h4>Items</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name ?? '' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    @foreach(['pending','processing','completed','cancelled'] as $status)
                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Update Status</button>
        </form>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
</div>
@stop
