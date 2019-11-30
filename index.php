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
        
        <div class="caja" style="width:200px; background:#11226D; float:left;"><b> Tipo de Pago <b>

            <select onChange="mostrarResultados(this.value);">
                <?php
                
                echo '<option value="1" selected> Crédito</option>';
                echo '<option value="2" >Contado/ otros</option>';                
                   
                        
                    
                
                ?>
            </select>
        </div>

        <div class="caja" style="width:200px; background:#11226D; float:left;"><b> Periodo <b>
            <select onChange="">
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

        <div class="caja" style="width:200px; background:#11226D; float:right;"><b>Semestre<b>
            <select onChange="">
                <?php
                    for($i=1;$i<11; $i++){
                        if($i == 11){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    
      <div class="caja" style="width:200px; background:#11226D; float:right;"><b>Entidad financiera<b>
            <select>
                <?php
                    echo '<option value="1" selected> Cooperativa Minuto de Dios</option>';
                    echo '<option value="2" >Icetex</option>';
                    echo '<option value="3" >Otros</option>';
                        
                    
                ?>
            </select>
        </div>
     <div>   
        <div class="resultados" style= "width: 450px;height: 225px; padding-top: 40px;">
        <canvas id="grafico"></canvas></div>
    </body>
    <script>
            $(document).ready(mostrarResultados());  

                function mostrarResultados(tipo_pago){
                    $('.resultados').html('<canvas id="grafico"></canvas>');
                    $.ajax({
                        type: 'POST',
                        url: 'php/procesar.php',
                        data: 'tipo_pago='+tipo_pago,
                        dataType: 'JSON',
                        success:function(data){

                            var valores = eval(data);

                          /*  var c = valores[0];
                            var i = valores[1];
                            var o = valores[2];*/
                            
                            var c =50;
                            var i= 10;
                            var o= 100;
                           

                            var Datos = {
                                    labels : ['Cooperativa Uniminuto', 'Icetex', 'Otros'],
                                    datasets : [
                                        {
                                            fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                                            strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                           data : [c, i, o]
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