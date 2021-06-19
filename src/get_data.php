<?php

include "config.php";

$sql = "SELECT * from comentarios ORDER BY id DESC";

$exec = mysqli_query($conn, $sql);

if ($exec) {
    $rawdata = [];
    $i=0;

    while($row = mysqli_fetch_array($exec))
    {
        $rawdata['data'][] = [
                                $row["id"],
                                $row["name"],
                                $row["lastname"],
                                $row["email"],
                                $row["phone"],
                                $row["comentario"],
                            ];

        
    }

    echo json_encode($rawdata);
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);