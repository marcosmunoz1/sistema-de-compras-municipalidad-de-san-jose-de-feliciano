<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Provisoria de Insumos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }

        .pagina {
            width: 600px;
            height: 500px;  
            background: white;
            margin: 20px auto;
            padding: 25px 35px;
            border: 1px solid #ccc;
            position: relative;
            box-sizing: border-box;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: bold;
        }

        .logo span {
            font-weight: normal;
            font-size: 12px;
            margin-left: 3px;
        }

        .centro {
            text-align: center;
            margin-top: -5px;
        }

        .caja-corralon {
            border: 1px solid #000;
            display: inline-block;
            padding: 3px 15px;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .titulo {
            font-weight: bold;
            font-size: 14px;
        }

        .subtitulo {
            font-size: 11px;
        }

        .numero {
            font-size: 13px;
            text-align: right;
        }

        .numero span {
            font-weight: bold;
        }

       .campo {
            position: relative;
            font-size: 13px;
            margin-top: 18px;
        }

        .linea-texto {
            display: inline-block;
            min-width: 300px;
            border-bottom: 1px solid #000;
            padding-bottom: 2px;
            margin-left: 5px;
            white-space: nowrap;
        }
        .campo_insumo{ 
          font-size: 13px;
          margin-top: 18px;
          margin-bot: 25px;   

        }

        .linea {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 88%; 
            margin-left: 0px; 
        } 

        .linea_entregar {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 56%; 
            margin-left: 5px;  
        } 
        
        .linea-corta {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 18%;
            margin-left: 5px;
        }
        .linea_asunto {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 75%; 
            margin-left: 5px; 
            
        } 
        
        .linea_asunto_vacia {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 100%;  
            margin-left: 5px;  
        }
        .linea_insumos{
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 88%;  
            margin-left: 5px;
        }
        .insumos-box {
            margin-top: 15px;
            border: 1px solid transparent;
            height: 260px;
            border-bottom: 1px solid #000;
            font-size: 13px;
        }

        .duplicado {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-10deg);
            font-size: 70px;
            color: rgba(180,180,180,0.25);
            font-weight: bold;
            letter-spacing: 3px;
        }

        .footer {
            position: absolute;
            bottom: 30px;
            right: 35px;
            font-size: 12px;
            text-align: right;
        }
       .linea-superpuesta {
            font-size: 13px;
        }

        .texto-superpuesto {
            position: relative;  
            display: inline-block; 
            width: 87%;    
        }

        .texto-superpuesto::after { 
            content: "";
            display: block;
            border-bottom: 1px solid #000;
            width: 100%;  
            margin-top: 1px;
             
        } 
    </style>
</head>
<body>
    <div class="pagina">
        <div class="encabezado">
            <div class="logo">
                San José de Feliciano<br>
                <span>Municipio</span>
            </div>

            <div class="centro">
                <div class="caja-corralon">Corralón Municipal</div><br>
                <div class="titulo">Solicitud Provisoria de Insumos</div>
                <div class="subtitulo">INTERNO / NO VALIDO COMO ORDEN DE COMPRA</div>
            </div>

            <div class="numero">
                Nº <span>00013000</span><br>
                Fecha …… / …… / ………
            </div>
        </div>

        <div class="campo linea-superpuesta"> 
            Proveedor: 
            <span class="texto-superpuesto"> 
                {{ $compra->proveedor->nombre }} - {{ $compra->proveedor->empresa }}
            </span> 
        </div>   
        <div class="campo linea-superpuesta">
            Entregar a:
           <span class="texto-superpuesto">
               {{$compra->empleado->nombre}}
           </span>
           
        </div>

        <div class="campo linea-superpuesta"> 
            Asunto/Obra/Automotor:
            <span class="texto-superpuesto">
               {{$compra->asunto_obra_automotor}}  
           </span>  
        </div>  
        <div class="campo">
               <span class="linea_asunto_vacia"></span>  
        </div>

        <div class="campo linea-superpuesta"> 
            Insumos: 
            <span class="texto-superpuesto">
                 @foreach($compra->detalle_compras as $detalle) 
                    {{ $detalle->producto->nombre }} - 
                @endforeach        
           </span>     
        </div>
         <div class="campo">
               <span class="linea_asunto_vacia"></span>  
        </div>
        <div class="campo">
               <span class="linea_asunto_vacia"></span>  
        </div>
        <div class="campo">
               <span class="linea_asunto_vacia"></span>  
        </div>   
       
        <div class="duplicado">DUPLICADO</div>

        <div class="footer">
            Autorizado por<br>
            Municipalidad de San José de Feliciano
        </div>
    </div>
</body>
</html>
 