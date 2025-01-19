<!-- resources/views/order/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Order Details  {{$order->total}}</h1>
    <p>Order ID: {{ $order->id }}</p>
    <p>Order ID: {{ $order->name }}</p>
    <!-- Display other order details -->
@endsection
