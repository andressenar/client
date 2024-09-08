<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
</head>
<body>
    <h1>Crear Categoría</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="category_name">Nombre:</label>
        <input type="text" id="category_name" name="category_name" required>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
