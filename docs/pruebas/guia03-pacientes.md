# Pruebas unitarias del módulo Pacientes (Guía 03)

Fecha: 24/11/2026 · Responsable: TU NOMBRE

| Caso | Resultado | Observación |
|------|-----------|-------------|
| CP01 | OK        | Listado inicial muestra 10 registros, total 40 y paginación |
| CP02 | OK        | Búsqueda por DNI exacto devuelve un único paciente |
| CP03 | OK        | Búsqueda parcial por apellido en minúsculas filtra coincidencias |
| CP04 | OK        | Paginación conserva el parámetro ?buscar= en la URL |
| CP05 | OK        | Validación muestra mensajes en español en campos obligatorios |
| CP06 | OK        | Rechaza DNI de 7 dígitos y conserva los datos ingresados |
| CP07 | OK        | Impide registrar un DNI duplicado (RN01) |
| CP08 | OK        | Rechaza fechas de nacimiento futuras |
| CP09 | OK        | Valida que el celular empiece con 9 y tenga 9 dígitos |
| CP10 | OK        | Registro válido muestra aviso verde y actualiza total a 41 |
| CP11 | OK        | Edición de celular guarda sin falso error de DNI duplicado |
| CP12 | OK        | Edición con DNI de otro paciente muestra error de duplicado (RN01) |
| CP13 | OK        | Impide eliminar paciente con citas y muestra aviso rojo (RF07) |
| CP14 | OK        | Elimina paciente sin citas, muestra aviso verde y total vuelve a 40 |
| CP15 | OK        | Ruta con ID inexistente (/pacientes/99999) devuelve error 404 |