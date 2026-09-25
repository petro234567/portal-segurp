@extends('layouts.app')
@section('title', 'Correos recibidos')
@section('content')
    <h1>Correos recibidos</h1>

    <table>
        <thead>
            <tr>
                <th>De</th>
                <th>Asunto</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($emails as $email)
                <tr>
                    <td>{{ $email->from_name ?? $email->from_email }}</td>
                    <td>{{ $email->subject }}</td>
                    <td>{{ $email->received_at }}</td>
                    <td>{{ $email->is_read ? 'Leído' : 'Nuevo' }}</td>
                </tr>
            @empty
                <tr><td colspan="4">No hay correos recibidos.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $emails->links() }}
@endsection