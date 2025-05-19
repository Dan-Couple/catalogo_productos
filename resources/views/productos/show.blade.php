<h1>Detalles del producto</h1>
<div class="line"></div>

<div>
    <h4>Nombre:</h4>
    <p class="form-display">{{ $producto->nombre }}</p>

    <h4>Descripción:</h4>
    <p class="form-display">{{ $producto->descripcion }}</p>

    <div class="little_form">
        <div class="Price">
            <h4>Precio:</h4>
            <p class="form-display">${{ number_format($producto->precio, 2) }}</p>
        </div>

        <div class="Stock">
            <h4>Stock:</h4>
            <p class="form-display">{{ $producto->stock }}</p>
        </div>

        <div class="State">
            <h4>Estado:</h4>
            <p class="form-display">{{ ucfirst($producto->estado) }}</p>
        </div>
    </div>

</div>


<style>
    h1{ color: #595959; font-size: 18px; font-weight: bold;}
    h4{margin-top: 10px; margin-bottom:5px; color: #A6A6A6; font-size: 12x; font-weight: bold;}
    
    .line{
        width: 100%;
        border-block-end: 1px solid #A6A6A6;
        margin-top: 10px;
        margin-block: 10px;
    }

    .form-display {
        background-color: white;
        border: 1px solid #A6A6A6;
        width: 380px;
        font-size: 12pt;
        border-radius: 5px;
        box-sizing: border-box;
        height: 35px;
        line-height: 30px;
        padding-left: 10px;
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

    .little_form .form-display {
        width: 120px;
        text-align: center;
    }
    
</style>