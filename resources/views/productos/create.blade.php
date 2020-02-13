<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="POST" action="/productos">
        @csrf

        nombre <input type="text" value="" name="name" />
        Precio <input type="text" value="" name="price" />
        sotkc <input type="text" value="" name="stock" />
        vencimiento <input type="date" value="" name="fecha_vencimiento" />
        fraccionable <input type="checkbox" value="1" name="fraccionable" />

        <button type="submit"> Guardar </button>

    </form>
</body>
</html>
