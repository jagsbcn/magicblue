<?php
class Calendario {
	
	private $dias_etiq;
	private $meses_etiq;

	private $mes_anterior;
	private $anyo_mes_anterior;
	private $dias_mes_anteior;

	private $mes_actual;
	private $anyo_mes_actual;
	private $dias_mes_actual;

	private $mes_siguiente;
	private $anyo_mes_siguiente;
	private $dias_mes_siguiente;

	private $semanas_mes_actual;
	private $dia_semana_inicio_mes;
	private $dia_semana_fin_mes;

	public function __construct() {
		$this->dias_etiq = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$this->meses_etiq = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		
		$this->mes_anterior = 0;
		$this->anyo_mes_anterior = 0;
		$this->dias_mes_anterior= 0;

		$this->mes_actual = 0;
		$this->anyo_mes_actual = 0;
		$this->dias_mes_actual = 0;

		$this->mes_siguiente = 0;
		$this->anyo_mes_siguiente = 0;
		$this->dias_mes_siguiente= 0;
		
		$this->semanas_mes_actual = 0;
		$this->dia_semana_inicio_mes = 0;
		$this->dia_semana_fin_mes = 0;
	}

	public function mostrarCal() {
		// Calculamos informacion para generar el calendario del mes
		$this->mes_actual = date("n");
		$this->anyo_mes_actual = date("Y");
		$this->dias_mes_actual = date("t");

		// cálculo de datos del mes anterior
		$this->mes_anterior = $this->mes_actual - 1;
		$this->anyo_mes_anterior = $this->anyo_mes_actual;
		if ($this->mes_anterior == 0) {
			$this->mes_anterior = 12;
			$this->anyo_mes_anterior--;
		}

		//cálculo de datos del mes siguiente
		$this->mes_siguiente = $this->mes_actual + 1;
		$this->anyo_mes_siguiente = $this->anyo_mes_actual;
		if ($this->mes_anterior == 13) {
			$this->mes_anterior = 1;
			$this->anyo_mes_anterior++;
		}

		$this->dias_mes_anterior = date("t", mktime(0, 0, 0, $this->mes_anterior, 1, $this->anyo_mes_anterior));
		$this->dias_mes_siguiente = date("t", mktime(0, 0, 0, $this->mes_siguiente, 1, $this->anyo_mes_siguiente));

		$this->semanas_mes_actual = ($this->dias_mes_actual % 7 == 0 ? 0 : 1) + intval($this->dias_mes_actual / 7);
		$this->dia_semana_inicio_mes = date('N', mktime(0, 0, 0, $this->mes_actual, 1, $this->anyo_mes_actual));
		$this->dia_semana_fin_mes  = date('N', mktime(0, 0, 0, $this->dias_mes_actual, 1, $this->anyo_mes_actual));

		if ($this->dia_semana_fin_mes < $this->dia_semana_inicio_mes) {
			$this->semanas_mes_actual ++;
		}

		// Dibujamos el calendario del mes		
		$calendario= '<table id="tb-calend">';

		//mostramos los elementos de navegacion de meses
		$calendario.='<tr><td colspan="7"><div class="navegacion">';
		$calendario.='<i class="glyphicon glyphicon-chevron-left" id="btn_mes_ant"></i>';
		$calendario.=$this->meses_etiq[$this->mes_actual-1];
		$calendario.='<i class="glyphicon glyphicon-chevron-right" id="btn_mes_sig"></i>';
		$calendario.='</div></td></tr>';

		// Mostramos los dias de la semana
		$calendario.= '<tr>';

		foreach ($this->dias_etiq as $dia) {
			$calendario.= '<td><span class="dia_etiq">'.$dia.'</span></td>';
		}

		$calendario.= '</tr>';


		// Mostramos los dias del mes
		$contador_dia = 1;
		$contador_dia_mes_sig = 1;
		$contando_dias = false;
		
		for ($i = 1; $i <= $this->semanas_mes_actual; $i++) {
			
			$calendario.='<tr>';

			for ($j = 1; $j <= 7; $j++) {
				$calendario.='<td>';

				if (!$contando_dias) {
					if ($j == $this->dia_semana_inicio_mes) {
						$contando_dias = true;
						$calendario.='<div class="dia" data-anyo="'.$this->anyo_mes_actual.'" data-mes="'.$this->mes_actual.'" data-dia="'.$contador_dia.'">';
						$calendario.='<span class="dia_num">'.$contador_dia.'</span>';
						$calendario.='</div>';
						$contador_dia++;
					} else {
						$calendario.='<div class="dia" data-anyo="'.$this->anyo_mes_anterior.'" data-mes="'.$this->mes_anterior.'" data-dia="'.($this->dias_mes_anterior - $this->dia_semana_inicio_mes + $j + 1).'">';
						$calendario.='<span class="dia_num_otro">'.($this->dias_mes_anterior - $this->dia_semana_inicio_mes + $j + 1).'</span>';
					}
				} else {
					if (!($contador_dia > $this->dias_mes_actual)) {
						$calendario.='<div class="dia" data-anyo="'.$this->anyo_mes_actual.'" data-mes="'.$this->mes_actual.'" data-dia="'.$contador_dia.'">';
						$calendario.='<span class="dia_num">'.$contador_dia.'</span>';
						$calendario.='</div>';
						$contador_dia++;
					} else {
						$calendario.='<div class="dia" data-anyo="'.$this->anyo_mes_siguiente.'" data-mes="'.$this->mes_siguiente.'" data-dia="'.$contador_dia_mes_sig.'">';
						$calendario.='<span class="dia_num_otro">'.$contador_dia_mes_sig.'</span>';
						$contador_dia_mes_sig++;
					}
				}

				$calendario.='</td>';
			}

			$calendario.='</tr>';
		}

		$calendario.= '</table>';

		return $calendario;
	}

	public function mostrarHor() {
		$horas = '<table><tr><td>jagsito</td></tr></table>';

		return $horas;
	}

	private function crearEtiquetas() {
		$etiquetas = '';
         
        foreach($this->dias_etiq as $indice => $etiqueta) {
            $etiquetas.='<li class="'.($indice==6?'end title':'start title').' title">'.$etiqueta.'</li>'; 
        }
         
        return $etiquetas;
	}
}
?>