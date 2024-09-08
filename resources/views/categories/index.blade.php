<!DOCTYPE html>
<html>
<head>
    <title>Categorías</title>
</head>
<body>
    <h1>Categorías</h1>
    <a href="{{ route('categories.create') }}">Crear Nueva Categoría</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category['category_name'] }}
                <a href="{{ route('categories.show', $category['id']) }}">Ver</a>
                <a href="{{ route('categories.edit', $category['id']) }}">Editar</a>
                <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
