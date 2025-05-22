@extends('accounts.layouts.app')

@section('title', 'Cuentas')

@section('content')
  <form method="GET" action="{{ route('accounts.index') }}">
    <input
      type="text"
      name="search"
      placeholder="Buscar por nombre"
      value="{{ request('search') }}"
    >
    <button>Buscar</button>
  </form>

  <a href="{{ route('accounts.create') }}">Crear cuenta</a>

  <ul>
    @foreach($accounts as $acct)
      <li>
        <a href="{{ route('accounts.show', $acct) }}">
          {{ $acct->customer_name }} — ${{ number_format($acct->balance,2) }}
        </a>
      </li>
    @endforeach
  </ul>
@endsection

