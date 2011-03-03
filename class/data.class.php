<?php
class data extends mysqli
{
	//Selezione di tutte le regioni
	
	public function getRegioni()
	{
		$query = "SELECT * FROM regioni";
		if($result = parent::query($query))
		{
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_array())
				{
					$regioni[] = array(
						'cod_regione' => $row['cod_regione'],
						'regione' => $row['regione']
					);
				}
				return $regioni;
			}
		}
	}
	
	//Seleziona le province della regione scelta
	
	public function getProvince($cod_regione)
	{
		$query = "SELECT * FROM province WHERE cod_regione = '".$cod_regione."'";
		if($result = parent::query($query))
		{
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_array())
				{
					$province[] = array(
						'codice' => $row['cod_provincia'],
						'nome' => $row['provincia']
					);
				}
				return $province;
			}
		}
	}
	
	//Seleziona i comuni della provincia scelta
	
	public function getComuni($cod_provincia)
	{
		$query = "SELECT * FROM comuni WHERE cod_provincia = '".$cod_provincia."'";
		if($result = parent::query($query))
		{
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_array())
				{
					$comuni[] = array(
						'codice' => $row['cod_istat'],
						'nome' => $row['comune']
					);
				}
				return $comuni;
			}
		}
	}
	
	//Seleziona il cap del comune scelto
	
	public function getCap($cod_istat)
	{
		$query = "SELECT * FROM cap WHERE cod_istat = '".$cod_istat."'";
		if($result = parent::query($query))
		{
			if($result->num_rows == 1)
			{
				$row = $result->fetch_array();
				$cap = $row['cap'];
				return $cap;
			}
		}
	}
}
?>