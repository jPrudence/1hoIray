<?php

function isa1horay( $isa_nbr, $dilatrin_n_ny_tapitrisa = false){

	$ahalava = strlen("$isa_nbr") - 1;
	$fizarany = ( $ahalava <= 6 ? 1: $ahalava-5 );
	$isa_a = substr( $isa_nbr, 0, $fizarany );
	$isa_b = substr( $isa_nbr, $fizarany, $ahalava );

	$isa_str = "";

	if($isa_nbr == 0 || !is_numeric($isa_nbr)){
		$isa_str = "aotra";
	}
	elseif($isa_nbr < 10)
		$isa_str = ['iray', 'roa', 'telo', 'efatra', 'dimy', 'enina', 'fito', 'valo', 'sivy'][$isa_nbr - 1];
	elseif($isa_nbr < 100){
		if($isa_nbr % 10 == 0)
			$isa_str = ["folo", "roapolo", "telopolo", "efapolo", "dimampolo", "enimpolo", "fitopolo", "valopolo", "sivifolo"][ ($isa_nbr / 10) - 1 ];
		else
			$isa_str = isa1horay($isa_b) . ($isa_a == 1?" ambin'ny ":" amby ") . isa1horay($isa_a*10);
	}
	elseif($isa_nbr < 1000){
		if($isa_nbr % 100 == 0)
			$isa_str = ["zato", "roanjato", "telonjato", "efajato", "dimanjato", "eninjato", "fitonjato", "valonjato", "sivinjato"][ ($isa_nbr / 100) - 1 ];
		else
			$isa_str = isa1horay($isa_b) . (( ($isa_b % 10==0 || $isa_b < 100) && $isa_nbr <= 200 )?" amby ":" sy ") . isa1horay($isa_a*100);
	}
	else{
		if($isa_a == 1 && $isa_nbr < 10000)
			$isa_str = ($isa_nbr != 1000?isa1horay($isa_b) . " sy ":"") . "arivo";
		else{
			$index = $ahalava >= 6 ?3:$ahalava-3;
			if($dilatrin_n_ny_tapitrisa)
				$index = $ahalava-3;

			$isa_vaventy = ["arivo", "alina", "hetsy", "tapitrisa", "safatsiroa", "tsitamboisa", "alinkisa", "tsipesipesenina", "tsitokiforohana", "tsihitanoanoa"];

			$isa_str =   isa1horay($isa_b) . ( $isa_b === 0? " ": " sy " . isa1horay( $isa_a) ) . " " . $isa_vaventy[$index];
		}
	}

	return str_replace(["tapitrisa tapitrisa", "iray amb", "aotra sy "], ["lavitrisa", "iraika amb", " "], $isa_str);
}

/*

   ___  ______               _
  |_  | | ___ \             | |
    | | | |_/ / __ _   _  __| | ___ _ __   ___ ___
    | | |  __/ '__| | | |/ _` |/ _ \ '_ \ / __/ _ \
/\__/ / | |  | |  | |_| | (_| |  __/ | | | (_|  __/
\____/  \_|  |_|   \__,_|\__,_|\___|_| |_|\___\___|


*/
