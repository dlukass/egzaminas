<h2>Suvestinė</h2>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Data</th>
            <th>Kategorija</th>
            <th>Suma</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $t)
            <tr>
                <td>{{ $t->date }}</td>
                <td>{{ $t->category->name }}</td>
                <td>{{ $t->amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>Min: {{ $stats['min'] }} | Max: {{ $stats['max'] }} | Vidurkis: {{ $stats['avg'] }}</p>
