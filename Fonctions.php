<!--
Travail Pratique N0.1 Programmation WEB 1
Étudiants: 
    Jorge Blanco
    German Mahecha
Groupe: TIM 01797 
Date: 01-jun-2015
College Maisonneuve
Fichier: fonctions.php
-->
<?php 

/*--------------------------------------------------------------------------
    Fonction creerOptionsPaysSelected
    
    Paramètres :
        $tabPays : Tableau des pays du monde.
        $paysC : Nom du payd choisi pour le utilisateur.
        
    Retourne une chaine de caracteres qui contienne la liste des options du select
    pour les pays.
------------------------------------------------------------------------*/


	function creerOptionsPaysSelected($tabPays,$paysC)
	{
		$optionsP="";
		foreach ($tabPays as $codePays => $nomPays) {
            if($paysC==$nomPays)
            	$optionsP.="<option value="."$codePays". " selected='selected'>$nomPays</option>\n";
            else
            	$optionsP.="<option value="."$codePays".">$nomPays</option>\n";
        }
		return $optionsP;
	}//fin function creerOptionsPaysSelected()

    /* ---------------------------------------------------------------------------
    Fonction creerOptionsVillesSelected
    
    Paramètres :
        $tabVilles : Tableau de noms des villes qui appartienne a un pays.
        $villeC : Nom de ville choisi pour un utilisateur.
    Retourne une chaine de caracteres qui contienne la liste des options du select
    pour les villes.
    
------------------------------------------------------------------------------ */

	function creerOptionsVillesSelected($tabVilles,$villeC)
	{
		$optionsV = "<option value='-'>Veuillez sélectionner une ville</option>\n"; 
        foreach($tabVilles as $ville)//Validation fait pour garder le nom de la ville sur le select pour les villes
        {
        	if($villeC==$ville[2])
            	$optionsV .= "<option value='$ville[2]'selected='selected'>".$ville[2]."</option>\n";
            else
            	$optionsV .= "<option value='$ville[2]'>".$ville[2]."</option>\n";
        }
        return $optionsV;
	}//fin function creerOptionsVillesSelected()

    /*--------------------------------------------------------------------------------------
    Fonction afficherMeteo
    
    Paramètres :
        $optMeteo : Contienne une chaine de characteres que fait reference a quel 
                    type de information va s'extreer de la météo. Les valeurs peuvent 
                    être: tim=Date et heure, ven=vent, vis= visibilité, tem= temperature, 
                    pre=pression et res=ressentie
        $conteMeteo : Contienne l'extraction de la météo du site 
                    http://www.webservicex.net/globalweather.asmx/GetWeather.
        
    Retourne une chaine qui contienne la information precise qu'a été extraie 
                    a partir d'un expresion reguliere de la variable 
                    $conteMeteo (Contenu de la meteo).
--------------------------------------------------------------------------------------*/

    function afficherMeteo($optMeteo, $conteMeteo)
    {
    	$extraction="";
    	$donnes="";
        $match=0;
        $donnes2= "";
    		
		switch($optMeteo)
    	{
    		case "tim":  $match=preg_match("/(&lt;Time&gt;)(.*)(&lt;\/Time&gt;)/", $conteMeteo, $extraction);
						//Extraction de la date et heure du contenu de la météo
                        if($match>0)// Validation pour savoir si l'extraction s'a fait correctement.
                        {
                            $donnes = $extraction[2]."<br/>";
                            return $donnes;
                        }
                        else
                            return "Temps: Non disponible";
    		            break;
    		case "ven": $match=preg_match("/(&lt;Wind&gt;)(.*)(&lt;\/Wind&gt;)/", $conteMeteo, $extraction);
						//Extraction du Vent du contenu de la météo
						if($match>0)// Validation pour savoir si l'extraction s'a fait correctement.
                        {
                           $donnes= "Vent : " . $extraction[2]."<br/>";
                           return $donnes;
                        }
                        else
                            return "Vent: Non disponible";
    		            break;
    		case "vis": $match=preg_match("/(&lt;Visibility&gt;)(.*)(&lt;\/Visibility&gt;)/", $conteMeteo, $extraction);
						//Extraction de la visibilité du contenu de la météo
						if($match>0)// Validation pour savoir si l'extraction s'a fait correctement.
                        {
                            $donnes= "Visibilite: ".$extraction[2]."<br/>";
                            return $donnes;
                        }
                        else
                            return "Visibilite: Non disponible";
    		            break;
    		case "tem": $match=preg_match("/(&lt;Temperature&gt;)(.*)(&lt;\/Temperature&gt;)/", $conteMeteo, $extraction);
						//Extraction de la temperature du contenu de la météo
						if($match>0)// Validation pour savoir si l'extraction s'a fait correctement.
                        {
                           // $donnes= "Temperature: ".$extraction[2]."<br/>";
                            $donnes = "Temps: ".$extraction[2]."<br/>";
                            return $donnes;
                        }
                        else
                            return "Temperature: Non disponible";
    		            break;
    		case "pre": $match=preg_match("/(&lt;Pressure&gt;)(.*)(&lt;\/Pressure&gt;)/", $conteMeteo, $extraction);
						//Extraction de la pression du contenu de la météo
						if($match>0)// Validation pour savoir si l'extraction s'a fait correctement.
                        {
                            $donnes= "Pression: ".$extraction[2]."<br/>";
                            return $donnes;
                        }
                        else
                            return "Pression: Non disponible";
    		            break;
            case "res": $match=preg_match("/(&lt;DewPoint&gt;)(.*)(&lt;\/DewPoint&gt;)/", $conteMeteo, $extraction);
                        //Extraction de la ressentie du contenu de la météo
                        if($match>0)// Validation pour savoir si l'extraction s'a fait correctement.
                        {
                            $donnes= "Ressentie: ".$extraction[2]."<br/>";
                            return $donnes;
                        }
                        else
                            return "Ressentie: Non disponible";
                        break;
    		default: break;
    	}//fin switch
    }//fin function afficherMeteo()

/************************************************************
    Fonction before
    
    Paramètres :
        $this : '/'
        $inthat : string $meteoTime
        
    Retourne une chainne de character avant le symbole '/'
    source : http://php.net/manual/es/function.substr.php
    
    ************************************************************/

    function before($this, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $this));
    }//fin  function before()

//*****************************************************************


 ?>


