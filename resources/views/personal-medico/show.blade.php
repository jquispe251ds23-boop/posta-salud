@extends('layouts.app')

@section('titulo', $medico->nombreCompleto())

@section('contenido')
    <div class="acciones" style="justify-content: space-between; align-items: center;">
        <div>
            <h1 style="margin-bottom: 0.25rem;">{{ $medico->nombreCompleto() }}</h1>
            <p style="margin: 0; color: var(--pico-muted-color);">
                {{ $medico->especialidad }} · Colegiatura {{ $medico->colegiatura }}
            </p>
        </div>
        <x-estado :activo="$medico->activo" />
    </div>

    <article>
        <header><strong>Datos del profesional</strong></header>
        <div class="grid">
            <div>
                <small>DNI</small>
                <p><strong>{{ $medico->dni }}</strong></p>
            </div>
            <div>
                <small>Especialidad</small>
                <p><strong>{{ $medico->especialidad }}</strong></p>
            </div>
            <div>
                <small>N° de colegiatura</small>
                <p><strong>{{ $medico->colegiatura }}</strong></p>
            </div>
        </div>
        <div class="grid">
            <div>
                <small>Cuenta de acceso vinculada</small>
                <p>
                    @if ($medico->user)
                        <strong>{{ $medico->user->name }}</strong> ({{ $medico->user->email }})
                    @else
                        <em>Sin cuenta vinculada</em>
                    @endif
                </p>
            </div>
            <div>
                <small>Total de citas históricas</small>
                <p><strong>{{ $medico->citas_count }}</strong></p>
            </div>
        </div>
    </article>

    <h2>Próximas citas programadas</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Paciente</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proximasCitas as $cita)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('H:i') }}</td>
                    <td>{{ $cita->paciente->nombreCompleto() }}</td>
                    <td>{{ ucfirst($cita->estado) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No tiene citas próximas programadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="acciones">
        <a href="{{ route('personal-medico.edit', $medico) }}" role="button">Editar datos</a>
        <a href="{{ route('personal-medico.index') }}">Volver al listado</a>
    </div>
@endsection