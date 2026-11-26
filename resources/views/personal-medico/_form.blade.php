@if ($errors->any())
    <article class="aviso-error">
        <strong>Revisa los siguientes errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </article>
@endif

<div class="grid">
    <label>
        DNI
        <input type="text" name="dni" maxlength="8"
               value="{{ old('dni', $medico->dni ?? '') }}"
               aria-invalid="{{ $errors->has('dni') ? 'true' : '' }}">
        @error('dni') <small>{{ $message }}</small> @enderror
    </label>

    <label>
        N° de colegiatura
        <input type="text" name="colegiatura" maxlength="6"
               value="{{ old('colegiatura', $medico->colegiatura ?? '') }}"
               aria-invalid="{{ $errors->has('colegiatura') ? 'true' : '' }}">
        @error('colegiatura') <small>{{ $message }}</small> @enderror
    </label>
</div>

<div class="grid">
    <label>
        Nombres
        <input type="text" name="nombres" maxlength="80"
               value="{{ old('nombres', $medico->nombres ?? '') }}"
               aria-invalid="{{ $errors->has('nombres') ? 'true' : '' }}">
        @error('nombres') <small>{{ $message }}</small> @enderror
    </label>

    <label>
        Apellidos
        <input type="text" name="apellidos" maxlength="80"
               value="{{ old('apellidos', $medico->apellidos ?? '') }}"
               aria-invalid="{{ $errors->has('apellidos') ? 'true' : '' }}">
        @error('apellidos') <small>{{ $message }}</small> @enderror
    </label>
</div>

<div class="grid">
    <label>
        Especialidad
        <select name="especialidad"
                aria-invalid="{{ $errors->has('especialidad') ? 'true' : '' }}">
            <option value="">Seleccione una especialidad...</option>
            @foreach (\App\Models\PersonalMedico::ESPECIALIDADES as $esp)
                <option value="{{ $esp }}"
                    @selected(old('especialidad', $medico->especialidad ?? '') === $esp)>
                    {{ $esp }}
                </option>
            @endforeach
        </select>
        @error('especialidad') <small>{{ $message }}</small> @enderror
    </label>

    <label>
        Cuenta de usuario (opcional)
        <select name="user_id"
                aria-invalid="{{ $errors->has('user_id') ? 'true' : '' }}">
            <option value="">-- Sin cuenta vinculada --</option>
            @foreach ($cuentasDisponibles as $cuenta)
                <option value="{{ $cuenta->id }}"
                    @selected((string) old('user_id', $medico->user_id ?? '') === (string) $cuenta->id)>
                    {{ $cuenta->name }} ({{ $cuenta->email }})
                </option>
            @endforeach
        </select>
        @error('user_id') <small>{{ $message }}</small> @enderror
    </label>
</div>