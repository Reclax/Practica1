@extends('accounts.layouts.app')

@section('title', 'Nueva Cuenta')

@section('content')
  <form action="{{ route('accounts.store') }}" method="POST">
    @csrf
    <label>Nombre del cliente</label>
    <input name="customer_name" required>
    <label>Saldo inicial</label>
    <input name="initial_balance" type="number" step="0.01" required>
    <button type="submit">Crear</button>
  </form>
@endsection
