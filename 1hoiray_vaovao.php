<?php

function avadika($isa){
	return implode('', array_reverse(str_split("$isa", 1)));
}

function 1hoiray($isa_nbr){
	if( ($isa_nbr == 0 || !is_numeric($isa_nbr)))
		$isa_str =  "zero";
	elseif (strlen("$isa_nbr")>3) {
		$isa_isantsokajy = array_reverse(array_map('avadika',str_split(avadika($isa_nbr), 3)));
		$sokajy_ho_avadika = array_shift($isa_isantsokajy);

		$isa_vaventy = ["arivo", "tapitrisa", "miliara"];

		$isan_ny_sokajy = count($isa_isantsokajy);
		$isa_isantsokajy_mitambatra = implode('', $isa_isantsokajy);

		$isa_str =  preg_replace(["/^iraika /"], [ "ray "], ($sokajy_ho_avadika == 0?"": ( ($sokajy_ho_avadika != 1 || $isan_ny_sokajy > 1 )?1hoiray($sokajy_ho_avadika) . " ":'' ) . ($isa_vaventy[$isan_ny_sokajy-1] ?? $isa_vaventy[2]) ) . ($isa_isantsokajy_mitambatra == 0? '':' ' . 1hoiray( $isa_isantsokajy_mitambatra )) );
	}
	else{

		$ahalava = strlen("$isa_nbr") - 1;

		$isa_a = substr( $isa_nbr, 0, 1 );
		$isa_b = substr( $isa_nbr, 1, $ahalava );

		if($isa_nbr < 10){
			$isa_str =  ['iraika', 'roa', 'telo', 'efatra', 'dimy', 'enina', 'fito', 'valo', 'sivy'][$isa_nbr - 1];
		}
		elseif($isa_nbr < 100){
			if($isa_nbr % 10 == 0)
			$isa_str = ["folo", "roampolo", "telompolo", "efampolo", "dimampolo", "enimpolo", "fitompolo", "valompolo", "sivimpolo"][ ($isa_nbr / 10) - 1 ];
			else
				$isa_str =  ($isa_a == 0?"":1hoiray($isa_a*10)) . " " . 1hoiray($isa_b) . ($isa_a==1?" amby":"");
		}
		else{
			if($isa_nbr % 100 == 0)
				$isa_str =  ["zato", "roanjato", "telonjato", "efajato", "dimanjato", "eninjato", "fitonjato", "valonjato", "sivinjato"][ ($isa_nbr / 100) - 1 ];
			else
				$isa_str =  1hoiray($isa_a*100) . " " . 1hoiray($isa_b);
		}

	}
	return $isa_str;
}

/*

   ___  ______               _
  |_  | | ___ \             | |
    | | | |_/ / __ _   _  __| | ___ _ __   ___ ___
    | | |  __/ '__| | | |/ _` |/ _ \ '_ \ / __/ _ \
/\__/ / | |  | |  | |_| | (_| |  __/ | | | (_|  __/
\____/  \_|  |_|   \__,_|\__,_|\___|_| |_|\___\___|


*/