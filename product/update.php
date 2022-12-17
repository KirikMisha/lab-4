<?php
$id=$_GET['id'];
$dom = new DOMDocument();
$dom->load('files/data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');

if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $new_prd = $dom->createElement('product');

    $node_id = $dom->createElement('id',$id);
    $new_prd->appendChild($node_id);

    $node_name = $dom->createElement('name',$prd_name);
    $new_prd->appendChild($node_name);

    $node_price = $dom->createElement('price',$price);
    $new_prd->appendChild($node_price);

    $node_description = $dom->createElement('description',$description);
    $new_prd->appendChild($node_description);
    $i=0;
    while (is_object($product->item($i++))){
        $prd=$product->item($i-1)->getElementsByTagName('id')->item(0);
        $prd_id= $prd->nodeValue;
        if( $prd_id== $id){
            $products->replaceChild($new_prd,$product->item($i-1));
            break;
        }
    }

    $dom->formatOutput = true;
    $dom->save('files/data.xml')or die('Error');
    header('location: index.php?page_layout=list');
}
?>
<style>
    .container-fuild{
        position: relative;
        font-size: 20px;
        color: white;
        font-family: sans-serif;
    }
    body{
        background: teal;
    }
    button{
        border: solid black;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 25px;
        color: white;
        background: black;
        cursor: pointer;

    }
    .card{
        height: 90vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .form-group{
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .form-group label{
        margin-right: 20px;
    }
    .btn-row{
        margin-top: 20px;
        display: flex;  
        justify-content: flex-end;
    }
</style>
<body>
<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Изменить товар</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Название товара</label>
                    <input type="text" name="prd_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Цена товара</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Описание товара</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <div class="btn-row">
                    <button name="sbm" class="btn btn-success" id="button" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>