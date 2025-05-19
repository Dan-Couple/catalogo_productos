@foreach ( $productos as $producto )
    <tr>
        <td>{{ $producto->id }}</td>
        <td class="Name_product">
            <h1>{{ $producto->nombre }}</h1>
            <h3>{{ $producto->descripcion }}</h3>

        </td>

        <td>${{ $producto->precio }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ $producto->estado }}</td>
        <td class="Actions">
            <button onclick="openModal('{{ route('productos.show', $producto->id) }}')">
                <span class="material-symbols-outlined">info</span>
            </button>
            <button onclick="openModal('{{ route('productos.edit', $producto->id) }}')">
                <span class="material-symbols-outlined">edit</span>
            </button>

            
            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro que quieres eliminarlo?')">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </form>
        </td>
    </tr>
@endforeach