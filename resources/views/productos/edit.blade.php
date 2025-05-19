<h1>Editar producto</h1>
<div class="line"></div>

<form id="form-editar-producto" method="POST" action="{{ route('productos.update', $producto->id) }}">
    @csrf
    @method('PUT')

    <h4>Nombre:</h4>
    <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

    <h4>Descripción:</h4>
    <textarea name="descripcion" required>{{ $producto->descripcion }}</textarea>

    <div class="little_form">
        <div class="Price">
            <h4>Precio:</h4>
            <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required>
        </div>

        <div class="Stock">
            <h4>Stock:</h4>
            <input type="number" name="stock" value="{{ $producto->stock }}" required>
        </div>

        <div class="State">
            <h4>Estado:</h4>
            <select name="estado">
                <option value="activo" @if($producto->estado == 'activo') selected @endif>Activo</option>
                <option value="inactivo" @if($producto->estado == 'inactivo') selected @endif>Inactivo</option>
            </select>
        </div>
    </div>

    <button type="submit">Actualizar</button>
</form>

<script>
document.getElementById('form-editar-producto').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST', 
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(res => res.ok ? res.json() : Promise.reject('Error al actualizar'))
    .then(() => {
        modal.style.display = 'none';
        filtrarProductos(); 
    });
});
</script>



<style>
    h1{ color: #595959; font-size: 18px; font-weight: bold;}
    
    .line{
        width: 100%;
        border-block-end: 1px solid #A6A6A6;
        margin-top: 10px;
        margin-block: 10px;
    }

    input{
        background-color: white;
        border: 1px solid #A6A6A6;
        width: 380px;
        text-align: left;
        font-size: 12pt;
        border-radius: 5px;
        box-sizing: border-box;
        height: 30px;
        color: #595959;
    }

    textarea{
        background-color: white;
        border: 1px solid #A6A6A6;
        width: 380px;
        text-align: left;
        font-size: 12pt;
        border-radius: 5px;
        box-sizing: border-box;
        height: 100px;
        color: #595959;
        font-family: sans-serif;
    }

    .little_form{
        margin-top: 5px;
        align-items: center;
        display: flex;
        gap: 10px;
        width: 380px;
    }

    .little_form input{
        background-color: white;
        border: 1px solid #A6A6A6;
        width: 120px;
        text-align: center;
        font-size: 12pt;
        border-radius: 5px;
        box-sizing: border-box;
        height: 30px;
        color: #595959;
    }

    .little_form select{
        background-color: white;
        border: 1px solid #A6A6A6;
        width: 120px;
        font-size: 12pt;
        text-align: center;
        border-radius: 5px;
        box-sizing: border-box;
        height: 30px;
        color: #595959;
    }

    button{
        /* Diseño externo */
        margin-top: 10px;
        margin-block: 10px;
        height: 30px;
        width: 100%;
        justify-content: center;
        border-radius: 5px;
        cursor: pointer;

        /* Diseño interno */
        background-color: #7BA7B7;
        border: none;
        box-sizing: border-box;

        /* Formato de texto */
        color: #F3F3F3;
        font-size: 12pt;
        font-weight: bold;
    }

    h4{margin-top: 10px; margin-bottom:5px; color: #A6A6A6; font-size: 12px; font-weight: bold;}
    .little_form h4{ margin-bottom:5px; color: #A6A6A6; font-size: 12px; font-weight: bold;}
    
    button:hover{background-color: #698f9c;}

</style>