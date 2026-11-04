<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $alumnos = [
        ["nombre" => "Ana", "dwes" => 8.5, "dwec" => 7.0],
        ["nombre" => "Pablo", "dwes" => 4.5, "dwec" => 3.0],
        ["nombre" => "Antonio", "dwes" => 6.5, "dwec" => 10.0]
    ];
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre del alumno</th>
                <th>dwes</th>
                <th>dwec</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($alumnos as $alumno) {
                    echo "<tr>";
                    echo "<td>" . $alumno["nombre"] . "</td>"
                    echo "<td>" . $alumno["dwes"] . "</td>" 
                    echo "<td>" . $alumno["dwec"] . "</td>" 
                    echo "</tr>"; 
                }
            ?>
        </tbody>
    </table>
</body>
</html>