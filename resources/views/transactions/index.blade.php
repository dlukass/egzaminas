@extends('layouts.app')

@section('content')

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card p-3 text-center">
            <h6>Pajamos</h6>
            <h3 class="text-success">{{ $income }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <h6>Išlaidos</h6>
            <h3 class="text-danger">{{ $expense }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <h6>Likutis</h6>
            <h3>{{ $income - $expense }}</h3>
        </div>
    </div>
</div>

<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Įrašai</h5>
        <a class="btn btn-primary" href="{{ route('transactions.create') }}">+ Naujas įrašas</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Kategorija</th>
                <th>Suma</th>
                <th>Pastaba</th>
                <th class="text-end">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactions as $t)
            <tr>
                <td>{{ $t->date }}</td>
                <td>{{ $t->category->name }}</td>
                <td>{{ $t->amount }}</td>
                <td>{{ $t->note }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-warning" href="{{ route('transactions.edit', $t) }}">Redaguoti</a>
                    <form class="d-inline" method="POST" action="{{ route('transactions.destroy', $t) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Trinti</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
