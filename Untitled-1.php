<?php
// Conectar ao banco de dados MySQL
$servername = "localhost";
$username = "root"; // ou seu nome de usuário do MySQL
$password = ""; // ou sua senha do MySQL
$dbname = "Longa_vG_vida";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

// Query SQL para pegar os dados
$sql = "SELECT 
            A.Nome, 
            A.Endereco, 
            A.Cidade, 
            A.Estado, 
            A.Cep, 
            P.Descricao AS Plano_Descricao, 
            P.Valor AS Plano_Valor
        FROM 
            Associados A
        JOIN 
            Planos P ON A.Plano = P.Numero";

$result = $conn->query($sql);

// Verificar se há resultados
if ($result->num_rows > 0) {
    // Criar o início da tabela HTML
    echo "<html>
            <head>
                <title>Associados e Planos</title>
                <style>
                    table { width: 100%; border-collapse: collapse; }
                    th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
                    th { background-color: #f2f2f2; }
                </style>
            </head>
            <body>
                <h2>Lista de Associados e seus Planos</h2>
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Cep</th>
                        <th>Plano Descrição</th>
                        <th>Plano Valor</th>
                    </tr>";

    // Exibir os dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Nome"] . "</td>
                <td>" . $row["Endereco"] . "</td>
                <td>" . $row["Cidade"] . "</td>
                <td>" . $row["Estado"] . "</td>
                <td>" . $row["Cep"] . "</td>
                <td>" . $row["Plano_Descricao"] . "</td>
                <td>" . number_format($row["Plano_Valor"], 2, ',', '.') . "</td>
              </tr>";
    }

    // Fechar a tabela
    echo "</table></body></html>";

} else {
    echo "0 resultados";
}

// Fechar a conexão
$conn->close();
?>
