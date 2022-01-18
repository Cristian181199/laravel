<x-layout>
    <form action="{{ route('clientes.store', [], false) }}" method="POST">
        <x-cliente.form
            :cliente="$cliente"/>
    </form>
</x-layout>
