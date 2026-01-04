@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h5 class="mb-3">Nauja kategorija</h5>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Pavadinimas</label>
            <input type="text" name="name" class="form-control" placeholder="Įveskite pavadinimą" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipas</label>
            <select name="type" class="form-select" required>
                <option value="income">Pajamos</option>
                <option value="expense">Išlaidos</option>
            </select>
        </div>

        <button class="btn btn-success">Sukurti</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Atgal</a>
    </form>
</div>
@endsection
