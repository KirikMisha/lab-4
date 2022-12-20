<?php

include "database.php";
$query = $db->query('Select * from list;');
$records = array();
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $records[] = $row;
    }
}

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
				foreach ($records as $record) {
					echo '
						<tr>
							<td>'.$record['id'].'</td>
							<td class="nowrap"><a href="/index.php?id='.$record['id'].'" target="_blank">'.$record['name'].'</a></td>
							<td class="nowrap">'.$record['price'].' $</td>
							<td>'.$record['description'].'</td>
							<td class="nowrap">
								<a class="btn" href="index.php?page_layout=update&id='.$record['id'].'">Редактировать</a>
                            </td>
                            <td>
								<a class="btn" href= "index.php?page_layout=delete&id='.$record['id'].'">Удалить</a>
                            </td>
						</tr>
					';
				}
			?>
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