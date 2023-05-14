@extends('layouts.app')

@section('content')
<h1>{{ $customer->name }}</h1>

<p>Email: {{ $customer->email }}</p>
<p>Тел
    ефон: {{ $customer->phone }}</p>

<h2>Адреса</h2>

@if (count($addresses) > 0)
    <ul>
        @foreach ($addresses as $address)
            <li>{{$address -> name}} ,{{ $address->city }},{{$address -> street}},{{$address->house}},{{$address->flour}},{{$address->intercome_code}}</li>
        @endforeach
    </ul>
@else
    <p>Адреса не найдены</p>
@endif
@endsection
