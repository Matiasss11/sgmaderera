<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


    <style>
        @page { margin: 50px; }
        

    </style>

    

    <title>Reporte de Movimientos</title>
</head>
<body>
    
    <div id="content" class="container">
        
        
        <!--Tabla-->
        <table style="" class="table table-condensed table-hover">
            
            <!-- Cabecera del reporte -->
            <thead style="background-color:#B6D4E6">
                <tr>
                    <th class="h4 text-center" colspan="5"style="color:#000000">Reporte de Movimientos</th>
                </tr>
            
                <!-- Datos del reporte -->
                <tr style="background-color:#FFFFFF; border:0">

                    <td colspan="3" >
                        <!-- Logo -->
                        <img  
                            src="{{asset('imagenes/logo/'.$empresa->first()->logo)}}"
                            alt="logo de la empresa"
                            width="150px"
                        > 
                    </td>
                    <td colspan="2" style="vertical-align:middle">
                        <!-- Emision -->
                        <p>Fecha Emisión: <strong>{{Carbon\Carbon::parse(Carbon\Carbon::now())->format('d/m/Y')}}</strong></p>
                        <p>Hora Emisión: <strong>{{Carbon\Carbon::parse(Carbon\Carbon::now())->toTimeString()}}</strong></p>
                        <p>Usuario: <strong>{{ Auth::user()->name }}</strong></p>
                    </td>

                </tr>
                @if($desde != NULL || $hasta != NULL)
                    <tr>
                        <td colspan="5" style="background-color:#FFFFFF;">
                                
                            
                            @if($desde!=NULL && $hasta!=NULL)
                                <p>Filtrado por Fecha Desde : <strong>{{Carbon\Carbon::parse($desde)->format('d/m/Y')}}</strong></p>
                                <p>Filtrado por Fecha Hasta : <strong>{{Carbon\Carbon::parse($hasta)->format('d/m/Y')}}</strong></p>
                            @elseif($desde!=NULL)
                                <p>Filtrado por Fecha Desde : <strong>{{Carbon\Carbon::parse($desde)->format('d/m/Y')}}</strong></p>
                            @elseif($hasta!=NULL)
                                <p>Filtrado por Fecha Hasta : <strong>{{Carbon\Carbon::parse($hasta)->format('d/m/Y')}}</strong></p>
                            @endif        
                        </td>
                    </tr>
                @endif
                <tr style="background-color:#B6D4E6">
                    <th style="text-align:center" colspan="2"  style="color:#000000" height="10px" ><p class="text-uppercase">Movimiento</p></th>
                    <th style="text-align:center" colspan="1"  style="color:#000000" height="10px"><p class="text-uppercase">Concepto</p></th>
                    <th style="text-align:center" colspan="1"  style="color:#000000" height="10px" ><p class="text-uppercase">Fecha</p></th>
                    <th style="text-align:center" colspan="1"  style="color:#000000" height="10px" ><p class="text-uppercase">monto</p></th>
                </tr>
            </thead>
            <tbody>
                    <?php $total=0;?>
            
                @foreach ($movimientos as $movimiento)
                <tr>
                    <td style="text-align:center" colspan="2">{{$movimiento->tipo_movimiento->nombre }}</td>
                    <td style="text-align:center" colspan="1">{{ $movimiento->subtipo_movimiento->nombre  }}</td>
                    <td style="text-align:center" colspan="1">{{Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y')}}</td>
                    <td style="text-align:center" colspan="1">$ {{$movimiento->monto}}</td>                    
                </tr>   
                    <?php
                        $total=$total+$movimiento->monto;
                    ?>      
                @endforeach
            </tbody>
                <tfoot>
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <td style="font-size:110%" colspan="2"><b>Total</b></td>
                        <td colspan="1"></td>
                        <td colspan="1"></td>
                        <td style="text-align:center; font-size:110%" colspan="1"><b>$ {{ $total }}</b></td>
                    </tr>
                </tfoot>
            
        </table>

    
    </div>

    
    <script src="{{asset('js/jQuery-3.3.1.js')}}"></script>



  
 <!-- Bootstrap 3.3.5 -->
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>

 
 

   <!-- AdminLTE App -->
 <script src="{{asset('js/app.min.js')}}"></script>
    

 <script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 800, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>

</body>
</html>
