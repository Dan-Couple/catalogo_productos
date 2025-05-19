<!DOCTYPE html>
<html lang="es">
<!-- [DATOS DE LA PÁGINA] -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Catálogo de productos</title>
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>

<!-- [CUERPO DE LA PÁGINA] -->
<body>
    <!-- [ENCABEZADO] -->
    <header>
        <div class="Info_Header">
            <h1>Catálogo de productos</h1>
            <h3>Registros: {{count($productos)}} productos</h3>
        </div>
    </header>

    <!-- [FORMATO DE POP-UP GENÉRICO] -->
    <div id="PopUp" class="modal" style="display: none;">
        <div class="modal_content">
            <span class="close">&times;</span>
            <div id="content"></div>
        </div>
    </div>

    <!-- [BOTÓN PARA AGREGAR PRODUCTOS] -->
    <div class="Bottom_Add">
        <button onclick="openModal('{{ route('productos.create') }}')">
            <span class="material-symbols-outlined">add</span>Agregar producto
        </button>
    </div>
    <div class="Separador"></div>

    <!-- [FILTROS DE BÚSQUEDA] -->
    <div class="Busqueda">
        <div class="Order_section">
        <h4>Ordenar por:</h4>
            <select id="Order_by">
                <option value=""> - </option>
                <option value="A-Z">Alfabeticamente: A-Z</option>
                <option value="Z-A">Alfabeticamente: Z-A</option>
                <option value="mayor stock">Productos con stock alto</option>
                <option value="menor stock">Productos con stock bajo</option>
                <option value="precio alto">Productos con precio alto</option>
                <option value="precio bajo">Productos con precio bajo</option>
            </select>
        </div>

        <div class="Search_section">
            <span class="material-symbols-outlined">search</span>
            <input type="text" id="busqueda" placeholder="Buscar producto">
        </div>

        <div class="Filter_section">
            <h4>Filtrar por:</h4>
            <select id="Filter_by">
                <option value=""> - </option>
                <option value="activo">Productos activos</option>
                <option value="inactivo">Productos inactivos</option>
            </select>
        </div>

        <button onclick="resetspace()">
            <span class="material-symbols-outlined">close</span>
        </button>

    </div>

    <!-- [TABLA DINÁMICA DE PRODUCTOS] -->
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th class="Description">Descripción del producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody id="tabla_productos">
            @include('productos.table', ['productos' => $productos])
        </tbody>
    </table>

</body>
</html>


<script>
/* >> Filtrar productos en tablas */
    /* Variables de entrada*/
    const busquedaInput = document.getElementById('busqueda');
    const orderSelect = document.getElementById('Order_by');
    const filterSelect = document.getElementById('Filter_by');

    /* Función para filtrar productos*/
    function filtrarProductos() {

        /*
            Usamos los datos de entrada de los selectores y el campo de búsqueda, despúes se envía una solicitud POST con
            parámetros en formato JSON. HTML recibe la solicitud con la tabla actualizada y lo inserta en el apartado con
            id: 'tabla_productos'.
        */
        const nombre = busquedaInput.value;
        const estado = filterSelect.value;
        const ordenar = orderSelect.value;

        fetch("{{ route('productos.search') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', /* Uso de token CSRF para seguridad */
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nombre,
                estado,
                ordenar
            })
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('tabla_productos').innerHTML = data.html;
        });
    }

    /* Se emplea "addEventListener" para ejecutar automáticamente el filtro de búsqueda cuando el usuario escribe o cambia el selector*/
    busquedaInput.addEventListener('input', filtrarProductos);
    orderSelect.addEventListener('change', filtrarProductos);
    filterSelect.addEventListener('change', filtrarProductos);

/* >> Función para limpiar los valores que hay en el sector de búsqueda y selectores de filtro*/
    function resetspace() {
        busquedaInput.value = '';
        orderSelect.value = '';
        filterSelect.value = '';
        filtrarProductos();
    }

    const modal = document.getElementById('PopUp');
    const modalContent = document.getElementById('content');
    const closeBTN = document.querySelector('.modal .close');

    function openModal(ruta) {
        fetch(ruta)
            .then(response => response.text())
            .then(html => {
                modalContent.innerHTML = html;
                modal.style.display = 'flex';
            });
    }

    closeBTN.addEventListener('click', () => modal.style.display = 'none');
    window.addEventListener('click', (e) => {
        if (e.target == modal) modal.style.display = 'none'
    });

</script>
