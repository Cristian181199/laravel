
@csrf
<div class="mb-6">
    <label for="denominacion"
        class="text-sm font-medium text-gray-900 block mb-2 @error('nombre') text-red-500 @enderror">
        Nombre
    </label>
    <input type="text" name="nombre" id="nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nombre') border-red-500 @enderror"
        value="{{ old('nombre', /*$denominacion*/) }}">
    @error('nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="fecha_alt"
        class="text-sm font-medium text-gray-900 block mb-2 @error('fecha_alt') text-red-500 @enderror">
        Fecha de Alta
    </label>
    <input type="date" name="fecha_alt" id="fecha_alt"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('fecha_alt') border-red-500 @enderror"
        value="{{ old('fecha_alt', /*$localidad*/) }}">
    @error('fecha_alt')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="salario"
        class="text-sm font-medium text-gray-900 block mb-2 @error('salario') text-red-500 @enderror">
        Salario
    </label>
    <input type="text" name="salario" id="salario"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('salario') border-red-500 @enderror"
        value="{{ old('salario', /*$localidad*/) }}">
    @error('salario')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="departamento"
        class="text-sm font-medium text-gray-900 block mb-2 @error('departamento') text-red-500 @enderror">
        Departamento
    </label>
        <select name="departamento" id="departamento" class="form-select block w-full mt-1 bg-gray-50 border border-gray-300">
            @foreach ($prueba as $prue)
                <option value="{{ $prue->id }}" {{ old('departamento') == $prue->id ? 'selected' : '' }}> {{ $prue->denominacion }} </option>
            @endforeach
          </select>
    @error('departamento')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
