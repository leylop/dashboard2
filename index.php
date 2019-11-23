<html style=" margin-top: -50;">
    <head>
        <title>Estadistica</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/chartJS/Chart.min.js"></script>
    </head>
    <style>
        .caja{
            
            max-width: 250px;
            padding: 10px;
            border: 1px solid #BDBDBD;
        }
        .caja select{
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        .resultados{
            margin: 40px ;             
            width: 450px;
        }
        .responsive-banner {
            margin: 40px auto;          
            width: 1400px;            
            height: 100;           
            position: relative;
            height: auto;
            min-height: 100px;
            max-height: 200px;
            border-radius: 5px;
            overflow: hidden;
            background-image: linear-gradient(to bottom right, #415AC6, #A784E0);
}
        .container-envelope {
            padding: 35px 15px;
            color: #fff;
            width: 330%;
        }
        img {
            max-width : 300px;
            width: 80%;
            position: relative;
        }
        span:after,
        span:before {
            content: "";
            position: absolute;
            display: block;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.1);
            width: 50px;
            height: 50px;
        }
        .circle-a:before {
            width: 500px;
            height: 500px;
            top: -300px; left: 52%;
            -webkit-transform: translate(-50%,0);
            -ms-transform: translate(-50%,0);
            transform: translate(-50%,0);
        }
        .circle-a:after {
            top: 160px;
            right: 10%;
        }
        .circle-b:before {
            top: 60%;
            left: -25px;
        }
        .circle-b:after {
            width: 600px;
            height: 150px;
            bottom: -70px;
            right: -70px;
        }
    </style>
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
        <div class="resultados" style= "width: 450px;height: 225px; padding-top: 40px;"><canvas id="grafico"></canvas></div>
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