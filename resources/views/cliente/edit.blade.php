<x-layout>
    <form action="{{ route('clientes.update', $cliente->id, false) }}" method="POST">
        @method('PUT')
        <x-cliente.form
            :cliente="$cliente"/>
    </form>
</x-layout>
