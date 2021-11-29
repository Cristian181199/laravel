<x-layout>
    <form action="{{ route('emple.update', $empleado->id, false) }}" method="POST">
        @method('PUT')
        <x-emple.form
            :nombre="$empleado->nombre"
            :fechAlt="$empleado->fecha_alt"
            :salario="$empleado->salario"
            :departamento="$empleado->denominacion"
            :prueba="$departamentos"/>
    </form>
</x-layout>
