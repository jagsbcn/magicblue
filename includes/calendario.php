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
	}

	public function mostrarCal() {
		// Dibujamos el calendario del mes		
		$calendario = '<div class="cal-mes">';

		// Mostramos los dias de la semana

		$calendario.= '<div class="cal-dias-etiq">';

		foreach ($this->dias_etiq as $dia) {
			$calendario.= '<div class="dia-etiq">'.$dia.'</div>';
		}

		$calendario.= '</div>';


		// Mostramos los dias del mes
		$contador_dia = 1;
		$contador_dia_mes_sig = 1;
		$contando_dias = false;
		
		for ($i = 1; $i <= $this->semanas_mes_actual; $i++) {
			
			$calendario.='<div class="cal-semana">';

			for ($j = 1; $j <= 7; $j++) {

				if (!$contando_dias) {
					if ($j == $this->dia_semana_inicio_mes) {
						$contando_dias = true;
						$calendario.='<div class="cal-dia" data-anyo="'.$this->anyo_mes_actual.'" data-mes="'.$this->mes_actual.'" data-dia="'.$contador_dia.'">';
						$calendario.='<span class="dia_num">'.$contador_dia.'</span>';
						$calendario.= '</div>';
						$contador_dia++;
					} else {
						$calendario.='<div class="cal-dia" data-anyo="'.$this->anyo_mes_anterior.'" data-mes="'.$this->mes_anterior.'" data-dia="'.($this->dias_mes_anterior - $this->dia_semana_inicio_mes + $j + 1).'">';
						$calendario.='<span class="dia_num_otro">'.($this->dias_mes_anterior - $this->dia_semana_inicio_mes + $j + 1).'</span>';
						$calendario.= '</div>';
					}
				} else {
					if (!($contador_dia > $this->dias_mes_actual)) {
						$calendario.='<div class="cal-dia" data-anyo="'.$this->anyo_mes_actual.'" data-mes="'.$this->mes_actual.'" data-dia="'.$contador_dia.'">';
						$calendario.='<span class="dia_num">'.$contador_dia.'</span>';
						$calendario.= '</div>';
						$contador_dia++;
					} else {
						$calendario.='<div class="cal-dia" data-anyo="'.$this->anyo_mes_siguiente.'" data-mes="'.$this->mes_siguiente.'" data-dia="'.$contador_dia_mes_sig.'">';
						$calendario.='<span class="dia_num_otro">'.$contador_dia_mes_sig.'</span>';
						$calendario.= '</div>';
						$contador_dia_mes_sig++;
					}
				}

			}

			$calendario.='</div>';  //div.cal-semana
		}

		$calendario.= '</div>';  //div.cal-mes

		return $calendario;
	}

	public function mostrarCabCal() {
		$cabecera = '<div class="page-header">';

		$cabecera.= '<div class="pull-right form-inline">';

		$cabecera.= '<div class="btn-group">';

		$cabecera.= '<button class="btn btn-primary"><< Prev</button>';
		$cabecera.= '<button class="btn btn-default">Hoy</button>';
		$cabecera.= '<button class="btn btn-primary">Sig >></button>';

		$cabecera.= '</div>';  //btn-group

		$cabecera.= '</div>';  //pull-right form-inline

		$cabecera.= '<h3>'.$this->meses_etiq[($this->mes_actual-1)].' '.$this->anyo_mes_actual.'</h3>';

		$cabecera.= '</div>';  //page-header

		return $cabecera;
	}

}
?>