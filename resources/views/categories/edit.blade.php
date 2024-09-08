<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>
    <form action="{{ route('categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="category_name">Nombre:</label>
        <input type="text" id="category_name" name="category_name" value="{{ $category['category_name'] }}" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
