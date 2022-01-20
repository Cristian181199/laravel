<x-layout>
    <div class="container mx-auto">
        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            DNI del cliente
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ $cliente->dni }}
        </p>
        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            Nombre del cliente
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ $cliente->nombre }}
        </p>
    </div>
</x-layout>
