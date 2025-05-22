@extends('accounts.layouts.app')

@section('title', 'Cuenta de '.$account->customer_name)

@section('content')
  <p>Cliente: {{ $account->customer_name }}</p>
  <p>Saldo actual: ${{ number_format($account->balance,2) }}</p>

  <h3>Realizar operación</h3>
  <form action="{{ route('accounts.transaction', $account) }}" method="POST">
    @csrf
    <select name="type">
      <option value="deposit">Depósito</option>
      <option value="withdrawal">Retiro</option>
    </select>
    <input name="amount" type="number" step="0.01" required>
    <button type="submit">Procesar</button>
  </form>

  <h3>Filtrar transacciones</h3>
  <form method="GET" action="{{ route('accounts.show', $account) }}">
    <label>Desde</label>
    <input type="date" name="start" value="{{ request('start') }}">
    <label>Hasta</label>
    <input type="date" name="end"   value="{{ request('end') }}">
    <button>Filtrar</button>
  </form>

  <h3>Historial</h3>
  <ul>
    @foreach($transactions as $tx)
      <li>
        {{ $tx->created_at }} —
        {{ $tx->type === 'deposit' ? '+' : '-' }}${{ number_format($tx->amount,2) }}
      </li>
    @endforeach
  </ul>
@endsection

