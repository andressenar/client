<!DOCTYPE html>
<html>
<head>
    <title>Ver Categoría</title>
</head>
<body>
    <h1>Ver Categoría</h1>
    <p>Nombre: {{ $category['category_name'] }}</p>
    <a href="{{ route('categories.edit', $category['id']) }}">Editar</a>
    <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    <a href="{{ route('categories.index') }}">Volver</a>
</body>
</html>
