<?php
include "database.php";
$id=$_GET['id'];

$record = null;
$query = $db->query('SELECT * FROM list WHERE id="'.$id.'"');
    if ($query->num_rows > 0) {
        $record = $query->fetch_assoc();
    }
if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $price = (int) $_POST['price'];
    $description = $_POST['description'];
    $id = (int) $id;
		$name = $db->real_escape_string($prd_name);
		$description = $db->real_escape_string($description);
		$db->query('UPDATE list SET name="'.$name.'", description="'.$description.'", price="'.$price.'" WHERE id="'.$id.'"');
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
                    <input type="text" name="prd_name" class="form-control" value="<?php echo $record['name'];?>" required>
                </div>
                <div class="form-group">
                    <label for="">Цена товара</label>
                    <input type="number" name="price" class="form-control" value="<?php echo $record['price'];?>" required>
                </div>
                <div class="form-group">
                    <label for="">Описание товара</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $record['description'];?>" required>
                </div>
                <div class="btn-row">
                    <button name="sbm" class="btn btn-success" id="button" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>