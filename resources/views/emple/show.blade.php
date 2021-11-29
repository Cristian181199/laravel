<x-layout>
    <div class="container mx-auto">
        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            Nombre del empleado:
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ $empleado->nombre }}
        </p>
        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            Fecha de alta:
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ (new DateTime($empleado->fecha_alt))->setTimeZone(new DateTimeZone('Europe/Madrid'))->format('d-m-Y H:i:s') }}
        </p>
        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            Salario:
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ number_format($empleado->salario, 2, ',', ' ') . ' €' }}
        </p>

        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            Departamento:
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ $empleado->denominacion }}
        </p>
    </div>
</x-layout>
