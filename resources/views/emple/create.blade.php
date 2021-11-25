<x-layout>
    <form action="{{ route('emple.store', [], false) }}" method="POST">
        <x-emple.form
            :nombre="''"
            :fecha_alt="''"
            :salario="''"
            :departamento="''"
            :prueba="$departamentos"/>
    </form>

</x-layout>
