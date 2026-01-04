@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h5 class="mb-3">Naujas įrašas</h5>

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Kategorija</label>
            <select class="form-select" name="category_id" required>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }} ({{ $c->type }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Suma</label>
            <input type="number" step="0.01" name="amount" class="form-control" placeholder="Įveskite sumą" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pastaba (neprivaloma)</label>
            <textarea class="form-control" name="note"></textarea>
        </div>

        <button class="btn btn-success">Sukurti</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Atgal</a>
    </form>
</div>
@endsection
