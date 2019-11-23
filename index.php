<html style=" margin-top: -50;">
    <head>
        <title>Estadistica</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/chartJS/Chart.min.js"></script>
        <link rel="stylesheet" href="CSS/estilos.css">
    </head>
    
<body> 
    <aside class="responsive-banner">
    
	<span class="circle-a"></span>
	<span class="circle-b"></span>	
	<div class="container-envelope">
    <img src="image.png" />
    <h1>Dashboard Uniminuto</h1>	
	</div>
</aside>
        
        <div style="width:900px; padding:3px;">
        
        <div class="caja" style="width:200px; background:#11226D; float:left;">
            <select onChange="mostrarResultados(this.value);">
                <?php
                    for($i=2000;$i<2020;$i++){
                        if($i == 2019){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>

        <div class="caja" style="width:200px; background:#11226D; float:left;">
            <select onChange="mostrarResultados(this.value);">
                <?php
                    for($i=2000;$i<2020;$i++){
                        if($i == 2019){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>

        <div class="caja" style="width:200px; background:#11226D; float:right;">
            <select onChange="mostrarResultados(this.value);">
                <?php
                    for($i=2000;$i<2020;$i++){
                        if($i == 2019){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    
        <div class="caja" style="width:200px; background:#11226D; float:right;">
            <select onChange="mostrarResultados(this.value);">
                <?php
                    for($i=2000;$i<2020;$i++){
                        if($i == 2019){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
     <div>   
        <div class="resultados" style= "width: 450px;height: 225px; padding-top: 40px;">
        <canvas id="grafico"></canvas></div>
    </body>
    <script>
            $(document).ready(mostrarResultados(2019));  

                function mostrarResultados(year){
                    $('.resultados').html('<canvas id="grafico"></canvas>');
                    $.ajax({
                        type: 'POST',
                        url: 'php/procesar.php',
                        data: 'year='+year,
                        dataType: 'JSON',
                        success:function(response){
                            var Datos = {
                                    labels : ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO'],
                                    datasets : [
                                        {
                                            fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                                            strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data : ['5555', '3232', '34234', '23424', '5634']
                                        }
                                    ]
                                }
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
                            Barra.clear();
                        }
                    });
                    return false;
                }
    </script>
</html>