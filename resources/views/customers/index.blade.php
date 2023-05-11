@extends('layouts.app')

@section('content')
    <h1>Список покупателей</h1>

    <form action="{{ url('/customers') }}" method="get" class="form-inline mb-3">
        <div class="form-group">
            <label class="mr-2">Заблокирован:</label>
            <select name="blocked" class="form-control mr-2">
                <option value="" {{ Request::input('blocked') == ''  ? 'selected' : '' }}>Все</option>
                <option value="0" {{ Request::input('blocked') == '0' ? 'selected' : '' }}>Нет</option>
                <option value="1" {{ Request::input('blocked') == '1' ? 'selected' : '' }}>Да</option>
            </select>
        </div>

        <div class="form-group">
            <label class="mr-2">Email:</label>
            <input type="text" name="email" class="form-control mr-2" value="{{ Request::input('email') }}">
        </div>

        <div class="form-group">
            <label class="mr-2">Телефон:</label>
            <input type="text" name="phone" class="form-control mr-2" value="{{ Request::input('phone') }}">
        </div>

        <div class="form-group">
            <label class="mr-2">Имя или фамилия:</label>
            <input type="text" name="name" class="form-control mr-2" value="{{ Request::input('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">Найти</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Номер</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>Заблокирован</th>
            </tr>
        </thead>
<tbody>
@foreach ($customers as $customer)
<tr>
<td>{{ $customer->id }}</td>
<td>{{ $customer->first_name }}</td>
<td>{{ $customer->last_name }}</td>
<td>{{ $customer->email }}</td>
<td>{{ $customer->phone }}</td>
<td>{{ $customer->address }}</td>
<td>{{ $customer->blocked ? 'Да' : 'Нет' }}</td>
</tr>
@endforeach
</tbody>
</table>
{{$customers->links()}}
@endsection