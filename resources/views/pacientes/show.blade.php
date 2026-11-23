@extends('layouts.app')

@section('titulo', $paciente->apellidos . ', ' . $paciente->nombres)

@section('contenido')
    <hgroup>
        <h1>{{ $paciente->apellidos }}, {{ $paciente->nombres }}</h1>
        <p>DNI: {{ $paciente->dni }}</p>
    </hgroup>

    <article>
        <dl>
            <dt><strong>Fecha de nacimiento</strong></dt>
            <dd>{{ $paciente->fecha_nacimiento->format('d/m/Y') }} ({{ $paciente->fecha_nacimiento->age }} años)</dd>

            <dt><strong>Sexo</strong></dt>
            <dd>{{ $paciente->sexo === 'F' ? 'Femenino' : 'Masculino' }}</dd>

            <dt><strong>Celular</strong></dt>
            <dd>{{ $paciente->telefono ?? '—' }}</dd>

            <dt><strong>Dirección</strong></dt>
            <dd>{{ $paciente->direccion ?? '—' }}</dd>
        </dl>
    </article>

    <div class="acciones">
        <a href="{{ route('pacientes.edit', $paciente) }}" role="button">Editar</a>

        <form method="POST" action="{{ route('pacientes.destroy', $paciente) }}"
              style="margin: 0;"
              onsubmit="return confirm('¿Seguro que deseas eliminar este paciente?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="secondary outline">Eliminar</button>
        </form>

        <a href="{{ route('pacientes.index') }}">Volver al listado</a>
    </div>
@endsection