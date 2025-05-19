<h1>Agregar producto</h1>
<div class="line"></div>
<form method="POST" action="{{ route('productos.create') }}">
    @csrf
    <h4>Nombre:</h4>
    <input type="text" name="nombre" required>

    <h4>Descripción:</h4>
    <textarea name="descripcion" required></textarea>

    <div class="little_form">
        <div class="Price">
            <h4>Precio:</h4>
            <input type="number" step="0.01" name="precio" required>
        </div>

        <div class="Stock">
            <h4>Stock:</h4>
            <input type="number" name="stock" required>
        </div>

        <div class="State">
            <h4>Estado:</h4>
            <select name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>
    </div>

    <button type="submit">Guardar</button>
</form>

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