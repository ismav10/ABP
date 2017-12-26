<?php

class ESTADISTICAS_SHOWALL {

    private $datos;
    private $volver;

    function __construct($array, $volver) {
        $this->datos = $array;
        $this->volver = $volver;
        $this->render();
    }

    function render() {
        include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';
        echo '<div class="container">';
		echo '<h4>'. $strings['Estadisticas']. ''. $_REQUEST['userName']. '</h4>';
		echo '<canvas id="myChart" width="200" height="200"></canvas>';
		echo '</div>';
        include 'footer.php';
    }

}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
function restarHoras(inicio, fin)
{  
  inicioMinutos = parseInt(inicio.substr(3,2));
  inicioHoras = parseInt(inicio.substr(0,2));
  
  finMinutos = parseInt(fin.substr(3,2));
  finHoras = parseInt(fin.substr(0,2));

  transcurridoMinutos = finMinutos - inicioMinutos;
  transcurridoHoras = finHoras - inicioHoras;
  
  if (transcurridoMinutos < 0) {
    transcurridoHoras--;
    transcurridoMinutos = 60 + transcurridoMinutos;
  }
  
  horas = transcurridoHoras.toString();
  minutos = transcurridoMinutos.toString();
  
  if (horas.length < 2) {
    horas = "0"+horas;
  }
  
  if (horas.length < 2) {
    horas = "0"+horas;
  }
  
  return (horas*60)+(minutos*1);
}
$(document).ready(function () {
	

   var tablas =	[];
   var duracion = [];
   
   $.get("../rest/JSONData.php", function(data, status){
		$.each(data,function(index, value){
			tablas.push( value.idTabla );
			duracion.push( restarHoras(value.horaInicio, value.horaFin) );
			//console.log('My array has at position ' + index + ', this value: ' + value.idTabla);
		});
    });
	
	//alert("Cargandotablas");

   new Chart(document.getElementById("myChart"), {
    type: 'bar',
    data: {
      labels: tablas,
      datasets: [
        {
          label: "Duracion de las tablas",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: duracion
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Duracion de las tablas ejecutadas'
      }
    }
});
   
});
</script>
