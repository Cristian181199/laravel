<x-layout>
    <div class="container mx-auto">
        <form action="/depart" method="POST">
            @csrf
            <div>
                <label for="denominacion">Denominacion:</label>
                <input type="text" name="denominacion" id="denominacion" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full">
            </div>

            <div>
                <label for="localidad">Localidad:</label>
                <input type="text" name="localidad" id="localidad" class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring w-full">
            </div>

            <div>
                <button class="bg-red-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                    Crear
                </button>
            </div>
        </form>
    </div>
</x-layout>