<x-layout>
    <div class="container mx-auto">
        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            Denominacion del departamento 
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ $departamento->denominacion }}
        </p>
        <h1 class="text-5xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">
            Localidad del departamento
        </h1>
        <p class="text-5xl font-normal leading-normal mt-0 mb-2 text-purple-800">
            {{ $departamento->localidad }}
        </p>
    </div>
</x-layout>