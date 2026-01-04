@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h5 class="mb-3">Redaguoti įrašą</h5>

    <form method="POST" action="{{ route('transactions.update', $transaction) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kategorija</label>
            <select class="form-select" name="category_id" required>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ $transaction->category_id == $c->id ? 'selected' : '' }}>
                        {{ $c->name }} ({{ $c->type }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Suma</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ $transaction->amount }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="date" class="form-control" value="{{ $transaction->date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pastaba</label>
            <textarea class="form-control" name="note">{{ $transaction->note }}</textarea>
        </div>

        <button class="btn btn-success">Atnaujinti</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Atgal</a>
    </form>
</div>
@endsection
