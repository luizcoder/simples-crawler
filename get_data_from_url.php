<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <title> Tabela IGPM </title>
    <body>
        
<?php
    header('Content-Type: text/html; charset=utf-8');
    include('simple_html_dom.php');


    $url = "http://br.advfn.com/indicadores/igpm";

    $content = file_get_html($url)->find("table[id=id_data_table]",0);

    echo '<table class="table">';
    foreach($content->find('tr') as $line){
        echo '<tr>';
        
        $child = 'th';
        if(!$line->find($child))
            $child = 'td';
        
        foreach($line->find($child) as $coluna)
            echo "<$child>".$coluna->plaintext."<$child>";

        echo '</tr>';
    }  
    echo '</table>';


?>
    </body>
</html>