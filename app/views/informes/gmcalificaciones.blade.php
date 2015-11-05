<html>
<!--This file was converted to xhtml by LibreOffice - see http://cgit.freedesktop.org/libreoffice/core/tree/filter/source/xslt for the code.-->
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<title>Calificaciones</title>
<style type="text/css">
	@page { }
	table { border-collapse:collapse; border-spacing:0; empty-cells:show }
	td, th { vertical-align:top; font-size:12pt;}
	h1, h2, h3, h4, h5, h6 { clear:both }
	ol, ul { margin:0; padding:0;}
	li { list-style: none; margin:0; padding:0;}
	<!-- "li span.odfLiEnd" - IE 7 issue-->
	li span. { clear: both; line-height:0; width:0; height:0; margin:0; padding:0; }
	span.footnodeNumber { padding-right:1em; }
	span.annotation_style_by_filter { font-size:95%; font-family:Arial; background-color:#fff000;  margin:0; border:0; padding:0;  }
	* { margin:0;}

	body { 
	  max-width:29.7cm;
	  padding-top:1.5cm; 
	  margin-bottom:0.5cm; margin-left:2cm; margin-right:2cm; writing-mode:lr-tb; 
	}
	
	.H { 
          margin-bottom:0cm; margin-top:0cm;
	  font-size:14pt; font-family:Arial; writing-mode:page; font-style:normal; font-weight:bold;
	}
	
	.T_25cm  {  width:25.7cm; float:none; }
	
	.T_12cm  { width:12.85cm; padding:0.097cm; text-align:left;
	border-left-style:none; border-right-style:none;
	border-top-width:thin; border-top-style:solid; border-top-color:#000000; 
	border-bottom-width:thin; border-bottom-style:solid; border-bottom-color:#000000; 
	}

	.T_cursos, .T_leyenda { 
	background-color:#eeeeee; padding:0.097cm; 
	border-left-style:none; border-right-style:none; 
	border-top-width:thin; border-top-style:solid; border-top-color:#000000; 
	border-bottom-width:thin; border-bottom-style:solid; border-bottom-color:#000000; 
	vertical-align: middle;
	}
	
	
	
	.T_resultados {  width:12.654cm; float:none; }

	
	.celda { 
	  padding:0; text-align:left; vertical-align: top; width:1.406cm;
	  border-width:thin; border-style:solid; border-color:#000000;
	 }
	 
	
	.gris  { background-color:#808080; }	
	.datos { font-size:6pt; min-height: 24px; font-family:Arial; writing-mode:page; font-style:normal; font-weight:bold;  }

	.P_orden, .P_cursos, .P_alumno  { 
	  margin-bottom:0.212cm; margin-top:0cm;
	  font-family:Arial; writing-mode:page;  
	 }
	.P_orden {  font-size:10pt; } 
	
	.P_cursos, .P_alumno { font-size:12pt; font-weight:bold; margin-bottom:0cm; }
	
	.P_modulo   { font-size:11pt; font-family:Arial;  writing-mode:page; font-weight:bold; }
	.P_leyenda  { font-size:12pt; font-family:Arial;  writing-mode:page; display: inline-block; }

	img  {  vertical-align: middle; }
	
	span {  vertical-align: middle;   display: inline-block; }
	
	
</style>



<script>

function rellenar_datos() {

@foreach($alumno->modulos as $modulo) 	     

      @for ($i = 1; $i <= $modulo->num_resultados; $i++)
        <?php /* Obtenemos nota con el siguiente código PHP. No encontre mejor manera de hacerlo. */ ?>
	<?php $str="$"."modulo->pivot->r".$i; $nota = eval ("return $str;"); ?>
        @if ($nota == '-2')  
        document.getElementById("m{{$modulo->id}}-r{{$i}}").style.background = "url({{URL::to('img/iconos/punto.png')}}) no-repeat center";
        document.getElementById("m{{$modulo->id}}-r{{$i}}").style.backgroundSize = "16px 16px";
        @elseif ($nota == '-1')
        document.getElementById("m{{$modulo->id}}-r{{$i}}").style.background = "url({{URL::to('img/iconos/asterisco.png')}}) no-repeat center";
        document.getElementById("m{{$modulo->id}}-r{{$i}}").style.backgroundSize = "16px 16px";
        @else
            @if ($nota < 5)
            document.getElementById("m{{$modulo->id}}-r{{$i}}").style.background = "url({{URL::to('img/iconos/menos.png')}}) no-repeat center";
            document.getElementById("m{{$modulo->id}}-r{{$i}}").style.backgroundSize = "16px 16px";
            @else
            document.getElementById("m{{$modulo->id}}-r{{$i}}").style.background = "url({{URL::to('img/iconos/mas.png')}}) no-repeat center";
            document.getElementById("m{{$modulo->id}}-r{{$i}}").style.backgroundSize = "16px 16px";
            @endif
        @endif
      @endfor
  
@endforeach

           
}
</script>




</head>
	
	
<body dir="ltr" onload="rellenar_datos()">


	<table class="T_25cm">
	<tr>
	<td> {{ HTML::image('img/logo.png', 'Logo de Centro Educativo', array('style' => 'width:7cm')) }} </td>
	<td class="H" style="text-align: right; vertical-align: bottom;">INFORME DE RESULTADOS DE APRENDIZAJE</td>
	</tr>
	</table>
	
	<table class="T_25cm">
	<tr><td><h2 class="H">CICLO FORMATIVO DE GRADO MEDIO - SISTEMAS MICROINFORMÁTICOS Y REDES</h2></td></tr>
	<tr><td><p class="P_orden">ORDEN de 7 de julio de 2009</p></td></tr>
	</table>
	
	<table class="T_25cm">
	<tr>
	<td style="text-align:left;width:16.997cm; ">
	<p class="P_alumno">Alumno/a: {{ $alumno->apellido1.' '.$alumno->apellido2.', '.$alumno->nombre}}</p>
	</td>
	<td style="text-align:right;width:8.703cm; " >
	<p class="P_alumno">Fecha: {{gmdate("j-m-Y,  G:i", time() + 3600*('+1'+date("I"))); }}</p>
	</td>
	</tr>
	</table>
	<table class="T_25cm">
	<colgroup><col width="562"/><col width="562"/></colgroup>
	<tr>
	<td class="T_cursos"><p class="P_cursos">1º CURSO</p></td>
	<td class="T_cursos"><p class="P_cursos">2º CURSO</p></td>
	</tr>
	
	
	<tr>
	<td class="T_12cm">
	<p class="P_modulo">Montaje y mantenimiento de equipos.</p> {{-- 1 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m1-r1">RA1</span></td>
	<td class="celda">     <p class="datos" id="m1-r2">RA2</span></td>
	<td class="celda">     <p class="datos" id="m1-r3">RA3</span></td>
	<td class="celda">     <p class="datos" id="m1-r4">RA4</span></td>
	<td class="celda">     <p class="datos" id="m1-r5">RA5</span></td>
	<td class="celda">     <p class="datos" id="m1-r6">RA6</span></td>
	<td class="celda">     <p class="datos" id="m1-r7">RA7</span></td>
	<td class="celda">     <p class="datos" id="m1-r8">RA8</span></td>
	<td class="celda gris"><p class="datos" id="m1-r9">RA9</span></td>
	</tr>
	</table>
	</td>
	<td class="T_12cm"><p class="P_modulo"> </p></td>
	</tr>
	
	
	<tr>
	<td class="T_12cm">
	<p class="P_modulo">Sistemas operativos monopuesto.</p> {{-- 2 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m2-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m2-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m2-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m2-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m2-r5">RA5</p></td>
	<td class="celda gris"><p class="datos" id="m2-r6">RA6</p></td>
	<td class="celda gris"><p class="datos" id="m2-r7">RA7</p></td>
	<td class="celda gris"><p class="datos" id="m2-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m2-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	<td class="T_12cm">
	<p class="P_modulo">Sistemas operativos en red.</p> {{-- 12 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m12-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m12-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m12-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m12-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m12-r5">RA5</p></td>
	<td class="celda">     <p class="datos" id="m12-r6">RA6</p></td>
	<td class="celda gris"><p class="datos" id="m12-r7">RA7</p></td>
	<td class="celda gris"><p class="datos" id="m12-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m12-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td class="T_12cm">
	<p class="P_modulo">Redes locales.</p> {{-- 4 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m4-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m4-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m4-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m4-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m4-r5">RA5</p></td>
	<td class="celda">     <p class="datos" id="m4-r6">RA6</p></td>
	<td class="celda gris"><p class="datos" id="m4-r7">RA7</p></td>
	<td class="celda gris"><p class="datos" id="m4-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m4-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	<td class="T_12cm">
	<p class="P_modulo">Servicios en red.</p>{{-- 14 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m14-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m14-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m14-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m14-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m14-r5">RA5</p></td>
	<td class="celda">     <p class="datos" id="m14-r6">RA6</p></td>
	<td class="celda">     <p class="datos" id="m14-r7">RA7</p></td>
	<td class="celda">     <p class="datos" id="m14-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m14-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	</tr>
	
	<tr>
	<td class="T_12cm">
	<p class="P_modulo">Aplicaciones ofimáticas.</p>{{-- 3 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda"><p class="datos" id="m3-r1">RA1</p></td>
	<td class="celda"><p class="datos" id="m3-r2">RA2</p></td>
	<td class="celda"><p class="datos" id="m3-r3">RA3</p></td>
	<td class="celda"><p class="datos" id="m3-r4">RA4</p></td>
	<td class="celda"><p class="datos" id="m3-r5">RA5</p></td>
	<td class="celda"><p class="datos" id="m3-r6">RA6</p></td>
	<td class="celda"><p class="datos" id="m3-r7">RA7</p></td>
	<td class="celda"><p class="datos" id="m3-r8">RA8</p></td>
	<td class="celda"><p class="datos" id="m3-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	<td class="T_12cm">
	<p class="P_modulo">Aplicaciones web.</p> {{-- 15 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m15-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m15-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m15-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m15-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m15-r5">RA5</p></td>
	<td class="celda gris"><p class="datos" id="m15-r6">RA6</p></td>
	<td class="celda gris"><p class="datos" id="m15-r7">RA7</p></td>
	<td class="celda gris"><p class="datos" id="m15-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m15-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td class="T_12cm">
	<p class="P_modulo"> </p>
	</td>
	<td class="T_12cm">
	<p class="P_modulo">Seguridad informática.</p>{{-- 13 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m13-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m13-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m13-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m13-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m13-r5">RA5</p></td>
	<td class="celda gris"><p class="datos" id="m13-r6">RA6</p></td>
	<td class="celda gris"><p class="datos" id="m13-r7">RA7</p></td>
	<td class="celda gris"><p class="datos" id="m13-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m13-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	</tr>
	
	
	<tr>
	<td class="T_12cm">
	<p class="P_modulo">Formación y orientación laboral.</p>{{-- 5 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m5-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m5-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m5-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m5-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m5-r5">RA5</p></td>
	<td class="celda">     <p class="datos" id="m5-r6">RA6</p></td>
	<td class="celda">     <p class="datos" id="m5-r7">RA7</p></td>
	<td class="celda gris"><p class="datos" id="m5-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m5-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	<td class="T_12cm">
	<p class="P_modulo"> </p>
	</td>
	</tr>
	
        <!--
	<tr>
	<td class="T_12cm">
	<p class="P_modulo"> </p>
	</td>
	<td class="T_12cm">
	<p class="P_modulo">Empresa e iniciativa empresarial.</p> {{-- 16 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda _1">     <p class="datos" id="m16-r1"> </p></td>
	<td class="celda _2">     <p class="datos" id="m16-r2"> </p></td>
	<td class="celda _3">     <p class="datos" id="m16-r3"> </p></td>
	<td class="celda _4">     <p class="datos" id="m16-r4"> </p></td>
	<td class="celda _5 gris"><p class="datos" id="m16-r5"> </p></td>
	<td class="celda _6 gris"><p class="datos" id="m16-r6"> </p></td>
	<td class="celda _7 gris"><p class="datos" id="m16-r7"> </p></td>
	<td class="celda _8 gris"><p class="datos" id="m16-r8"> </p></td>
	<td class="celda _9 gris"><p class="datos" id="m16-r9"> </p></td>
	</tr>
	</table>
	</td>
	</tr>
	-->

	<tr>
	<td class="T_12cm">
	<p class="P_modulo"> </p>
	</td>
	<td class="T_12cm">
	<p class="P_modulo">Empresa e iniciativa empresarial.</p> {{-- 16 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m16-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m16-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m16-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m16-r4">RA4</p></td>
	<td class="celda gris"><p class="datos" id="m16-r5">RA5</p></td>
	<td class="celda gris"><p class="datos" id="m16-r6">RA6</p></td>
	<td class="celda gris"><p class="datos" id="m16-r7">RA7</p></td>
	<td class="celda gris"><p class="datos" id="m16-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m16-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	</tr>

	
	<tr>
	<td class="T_12cm">
	<p class="P_modulo"> </p>
	</td>
	<td class="T_12cm">
	<p class="P_modulo">Formación en centros de trabajo</p>{{-- 17 --}}
	<table class="T_resultados">
	<tr>
	<td class="celda">     <p class="datos" id="m17-r1">RA1</p></td>
	<td class="celda">     <p class="datos" id="m17-r2">RA2</p></td>
	<td class="celda">     <p class="datos" id="m17-r3">RA3</p></td>
	<td class="celda">     <p class="datos" id="m17-r4">RA4</p></td>
	<td class="celda">     <p class="datos" id="m17-r5">RA5</p></td>
	<td class="celda">     <p class="datos" id="m17-r6">RA6</p></td>
	<td class="celda">     <p class="datos" id="m17-r7">RA7</p></td>
	<td class="celda">     <p class="datos" id="m17-r8">RA8</p></td>
	<td class="celda gris"><p class="datos" id="m17-r9">RA9</p></td>
	</tr>
	</table>
	</td>
	</tr>
	
	</table>
	
	
	<table class="T_leyenda" style="width:25.7cm;"><tr>
	<td style="text-align:left;width:6.426cm; " >
	<div class="P_leyenda">{{ HTML::image('img/iconos/punto.png', 'No evaluado', array('style' => 'height:24px')) }}
	&nbsp;&nbsp;<span>No evaluado</span></div>
	</td>
	<td style="text-align:left;width:6.426cm; " >
	<div class="P_leyenda">{{ HTML::image('img/iconos/asterisco.png', 'En proceso', array('style' => 'height:24px')) }}
	&nbsp;&nbsp;<span>En proceso</span></div>
	</td>
	<td style="text-align:left;width:6.426cm; " >
	<div class="P_leyenda">{{ HTML::image('img/iconos/menos.png', 'No superado', array('style' => 'height:24px')) }}
	&nbsp;&nbsp;<span>No superado</span></div>
	</td>
	<td style="text-align:left;width:6.426cm; "> 
	<div class="P_leyenda">{{ HTML::image('img/iconos/mas.png', 'Superado', array('style' => 'height:24px')) }}
	&nbsp;&nbsp;<span>Superado</span></div>
	</td></tr>
	</table>
	
</body>
</html>