<x-layout>
    <x-depart.search/>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Clientes</h1>
        <div class="container flex justify-center mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="border-b border-gray-200 shadow">
                        <table>
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Nombre
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        DNI
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Editar
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Borrar
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($clientes as $cliente)

                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $cliente->nombre }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">{{ $cliente->dni }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="/clientes/create" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo cliente</a>
    </div>
    {{ $clientes->links() }}
</x-layout>
