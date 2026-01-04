@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h5 class="mb-3">Redaguoti kategoriją</h5>

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pavadinimas</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipas</label>
            <select name="type" class="form-select" required>
                <option value="income" {{ $category->type=='income'?'selected':'' }}>Pajamos</option>
                <option value="expense" {{ $category->type=='expense'?'selected':'' }}>Išlaidos</option>
            </select>
        </div>

        <button class="btn btn-success">Atnaujinti</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Atgal</a>
    </form>
</div>
@endsection
