@extends('layouts.app')

@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Kategorijos</h5>
        <a class="btn btn-primary" href="{{ route('categories.create') }}">+ Nauja</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pavadinimas</th>
                <th>Tipas</th>
                <th class="text-end">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>
                    {{ $c->type === 'income' ? 'Pajamos' : 'Išlaidos' }}
                </td>
                <td class="text-end">
                    <a class="btn btn-sm btn-warning" href="{{ route('categories.edit', $c) }}">Redaguoti</a>
                    <form class="d-inline" method="POST" action="{{ route('categories.destroy', $c) }}" onsubmit="return confirm('Ar tikrai trinti?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Trinti</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($categories->isEmpty())
        <p class="text-center mt-3">Nėra kategorijų</p>
    @endif
</div>
@endsection