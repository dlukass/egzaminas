@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h5 class="mb-3">Generuoti ataskaitą</h5>

    <form method="POST" action="{{ route('reports.generate') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nuo</label>
            <input type="date" class="form-control" name="from" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Iki</label>
            <input type="date" class="form-control" name="to" required>
        </div>

        <div class="mb-3">
            <label class="form-label">El. paštas (neprivaloma)</label>
            <input type="email" class="form-control" name="email">
        </div>

        <button class="btn btn-success">Generuoti PDF</button>
    </form>
</div>
@endsection
