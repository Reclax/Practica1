@extends('accounts.layouts.app')

@section('title', 'Transacciones')

@section('content')
  <a href="{{ route('accounts.index') }}">← Volver a cuentas</a>

  <form method="GET" action="{{ route('transactions.index') }}">
    <label>Desde</label>
    <input type="date" name="start" value="{{ request('start') }}">
    <label>Hasta</label>
    <input type="date" name="end"   value="{{ request('end') }}">
    <button>Filtrar</button>
  </form>

  <ul>
    @foreach($transactions as $tx)
      <li>
        {{ $tx->created_at }} —
        {{ $tx->account->customer_name }} —
        {{ $tx->type === 'deposit' ? 'Depósito' : 'Retiro' }}
        ${{ number_format($tx->amount,2) }}
      </li>
    @endforeach
  </ul>
@endsection
