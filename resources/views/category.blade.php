<h1>CATEGORIAS</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $category)
            <tr>
                <td>{{ $category['id'] }}</td>
                <td>{{ $category['category_name'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">No hay categorías disponibles.</td>
            </tr>
        @endforelse
    </tbody>
</table>


