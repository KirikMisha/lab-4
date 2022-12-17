<?php
$dom = new DOMDocument();
$dom->load('files/data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
?>
<style>
    *{
        margin: 0;
        padding: 0;
        text-decoration: none;
    }
    body{
        background: teal;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }
    th{
        padding: 10px 20px;
    }
    .container-fuild{
        max-width: 1200px;
        font-size: 25px;
        font-family: sans-serif;
        color: white;
    }
    th{
        border: solid  black;
        color:white;
    }
    td{
        padding: 10px 20px;
        max-width: max-content;
        border: solid  black;
    }
    a .btn.btn-primary{
        border: solid  black;
    }
    #button{
        padding: 10px 20px;
        border: solid black;
        border-radius: 10px;
        color: white;
        background: black;
    }
    table{
        max-width: 100vw;
        border-collapse: collapse;
    }
    .card-body{
        display: flex;
        justify-content: center;
    }
    .card-header{
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

</style>
<body>
<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Список Товаров</h2>
            <a class="btn btn-primary" id="button" href="index.php?page_layout=create">Добавить</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                $product=$products->getElementsByTagName('product');
                while (is_object($product->item($i++))){
                    ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $product->item($i-1)->getElementsByTagName('name')->item(0)->nodeValue?></td>
                    <td><?php echo $product->item($i-1)->getElementsByTagName('price')->item(0)->nodeValue?> $</td>
                    <td><?php echo $product->item($i-1)->getElementsByTagName('description')->item(0)->nodeValue?></td>
                    <td><a href="index.php?page_layout=update&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Изменить <?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?></a></td>
                    <td><a onclick="return Del('<?php echo $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue;?>//')"  href= "index.php?page_layout=delete&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Удалить </a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script>
    function Del(name){
        return confirm("Удалить  "+name+" ?");
    }
</script>