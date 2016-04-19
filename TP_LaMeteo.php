<!--
Travail Pratique N0.1 Programmation WEB 1
Étudiants: 
    Jorge Blanco
    German Mahecha
Groupe: TIM 01797
Date: 01-jun-2015
College Maisonneuve
Fichier:TP_LaMeteo.php
-->

<?php 
//Fichier reference des fonctions
require_once( "fonctions.php"); 
//Initialisation des variables a utiliser
$pasyRequete="" ; 
$message="" ; 
$paysChoisi="selected='selected'" ;
$villeChoisi="Selecctionnez une ville" ; 
$nbVilles=0; $optionsVilles="" ; 
$aficherMeteo="" ; 
$activerVilles="visibility:hidden" ; 
$veuillezSelectVille="" ; 
$meteoTime="" ; 
$meteoVent="" ; 
$meteoVisib="" ; 
$meteoTemp="" ; 
$meteoRess="" ; 
$activerImage="visibility:hidden" ; 
$meteoPres="" ; 
$nbVille=0; 
// traitement de chainnes de character pour extraire des messages //d 'un façon cohérente.
    $extraireTemp="";
    $extraireTemp2="";
    $extraireRess="";
    $extraireRess2="";
    $extraireTime="";
    $txtRes="";

    //tableau qui contienne les codes et noms des pays du monde.
    $tableauPays= array("-"=>" Veuillez sélectionner un pays","AD"=>"Andorra","AE"=>"United Arab Emirates","AF"=>"Afghanistan","AG"=>"Antigua and Barbuda","AI"=>"Anguilla","AL"=>"Albania","AM"=>"Armenia","AN"=>"Netherlands Antilles","AO"=>"Angola","AQ"=>"Antarctica","AR"=>"Argentina","AS"=>"Samoa","AT"=>"Austria","AU"=>"Australia","AW"=>"Aruba","AZ"=>"Azerbaijan","BA"=>"Bosnia and Herzegovina","BB"=>"Barbados","BD"=>"Bangladesh","BE"=>"Belgium","BF"=>"Burkina Faso","BG"=>"Bulgaria","BH"=>"Bahrain","BI"=>"Burundi","BJ"=>"Benin","BM"=>"Bermuda","BN"=>"Brunei Darussalam","BO"=>"Bolivia","BR"=>"Brazil","BS"=>"Bahamas","BT"=>"Bhutan","BU"=>"Burma","BV"=>"Bouvet Island","BW"=>"Botswana","BY"=>"Belarus","BZ"=>"Belize","CA"=>"Canada","CC"=>"Cocos (Keeling) Islands","CF"=>"Central African Republic","CG"=>"Congo","CH"=>"Switzerland","CI"=>"Côte D'ivoire ","CK "=>"Cook Islands ","CL "=>"Chile ","CM "=>"Cameroon ","CN "=>"China ","CO "=>"Colombia ","CR "=>"Costa Rica ","CS "=>"Czechoslovakia ", "CU "=>"Cuba ","CV "=>"Cape Verde ","CX "=>"Christmas Island ","CY "=>"Cyprus ","CZ "=>"Czech Republic ","DD "=>"German Democratic Republic ",
        "DE "=>"Germany ","DJ "=>"Djibouti ","DK "=>"Denmark ","DM "=>"Dominica ","DO "=>"Dominican Republic ","DZ "=>"Algeria ","EC "=>"Ecuador ","EE "=>"Estonia ","EG "=>"Egypt ","EH "=>"Western Sahara ","ER "=>"Eritrea ","ES "=>"Spain ","ET "=>"Ethiopia ","FI "=>"Finland ","FJ "=>"Fiji ","FK "=>"Falkland Islands (Malvinas) ","FM "=>"Micronesia ","FO "=>"Faroe Islands ","FR "=>"France ","FX "=>"France, Metropolitan ","GA "=>"Gabon ","GB "=>"United Kingdom ","GD "=>"Grenada ","GE "=>"Georgia ","GF "=>"French Guiana ","GH "=>"Ghana ","GI "=>"Gibraltar ","GL "=>"Greenland ","GM "=>"Gambia ","GN "=>"Guinea ","GP "=>"Guadeloupe ","GQ "=>"Equatorial Guinea ","GR "=>"Greece ","GS "=>"South Georgia and the South Sandwich Islands ","GT "=>"Guatemala ","GU "=>"Guam ","GW "=>"Guinea-Bissau ","GY "=>"Guyana ","HK "=>"Hong Kong ","HM "=>"Heard & McDonald Islands ","HN "=>"Honduras ","HR "=>"Croatia ","HT "=>"Haiti ","HU "=>"Hungary ","ID "=>"Indonesia ","IE "=>"Ireland ","IL "=>"Israel ","IN "=>"India ","IO "=>"British Indian Ocean Territory ","IQ "=>"Iraq ","IR "=>"Iran, Islamic Republic of ","IS "=>"Iceland ","IT "=>"Italy ","JM "=>"Jamaica ","JO "=>"Jordan ","JP "=>"Japan ",
        "KE "=>"Kenya ","KG "=>"Kyrgyzstan ","KH "=>"Cambodia ","KI "=>"Kiribati ","KM "=>"Comoros ","KN "=>"Saint Kitts and Nevis ","KP "=>"Korea, Democratic People 's Republic of","KR"=>"Korea, Republic of","KW"=>"Kuwait","KY"=>"Cayman Islands","KZ"=>"Kazakhstan","LA"=>"Lao People's Democratic Republic ","LB "=>"Lebanon ","LC "=>"Saint Lucia ","LI "=>"Liechtenstein ","LK "=>"Sri Lanka ","LR "=>"Liberia ","LS "=>"Lesotho ","LT "=>"Lithuania ","LU "=>"Luxembourg ","LV "=>"Latvia ","LY "=>"Libyan Arab Jamahiriya ","MA "=>"Morocco ","MC "=>"Monaco ","MD "=>"Moldova, Republic of ","MG "=>"Madagascar ","MH "=>"Marshall Islands ","ML "=>"Mali ","MN "=>"Mongolia ","MM "=>"Myanmar ","MO "=>"Macau ","MP "=>"Northern Mariana Islands ","MQ "=>"Martinique ","MR "=>"Mauritania ","MS "=>"Monserrat ","MT "=>"Malta ","MU "=>"Mauritius ","MV "=>"Maldives ","MW "=>"Malawi ","MX "=>"Mexico ","MY "=>"Malaysia ","MZ "=>"Mozambique ","NA "=>"Namibia ","NC "=>"New Caledonia ","NE "=>"Niger ","NF "=>"Norfolk Island ","NG "=>"Nigeria ","NI "=>"Nicaragua ","NL "=>"Netherlands ","NO "=>"Norway ","NP "=>"Nepal ","NR "=>"Nauru ","NT "=>"Neutral Zone ","NU "=>"Niue ","NZ "=>"New Zealand ","OM "=>"Oman ",
        "PA "=>"Panama ","PE "=>"Peru ","PF "=>"French Polynesia ","PG "=>"Papua New Guinea ","PH "=>"Philippines ","PK "=>"Pakistan ","PL "=>"Poland ","PM "=>"Saint Pierre and Miquelon ","PN "=>"Pitcairn ","PR "=>"Puerto Rico ","PT "=>"Portugal ","PW "=>"Palau ","PY "=>"Paraguay ","QA "=>"Qatar ","RE "=>"Réunion ","RO "=>"Romania ","RU "=>"Russian Federation ","RW "=>"Rwanda ","SA "=>"Saudi Arabia ","SB "=>"Solomon Islands ","SC "=>"Seychelles ","SD "=>"Sudan ","SE "=>"Sweden ","SG "=>"Singapore ","SH "=>"St. Helena ","SI "=>"Slovenia ","SJ "=>"Svalbard & Jan Mayen Islands ","SK "=>"Slovakia ","SL "=>"Sierra Leone ","SM "=>"San Marino ","SN "=>"Senegal ","SO "=>"Somalia ","SR "=>"Suriname ","ST "=>"Sao Tome & Principe ","SU "=>"Union of Soviet Socialist Republics ","SV "=>"El Salvador ","SY "=>"Syrian Arab Republic ","SZ "=>"Swaziland ","TC "=>"Turks & Caicos Islands ","TD "=>"Chad ","TF "=>"French Southern Territories ","TG "=>"Togo ","TH "=>"Thailand ","TJ "=>"Tajikistan ","TK "=>"Tokelau ","TM "=>"Turkmenistan ","TN "=>"Tunisia ","TO "=>"Tonga ","TP "=>"East Timor ","TR "=>"Turkey ","TT "=>"Trinidad & Tobago ","TV "=>"Tuvalu ","TW "=>"Taiwan, Province of China ",
        "TZ "=>"Tanzania, United Republic of ","UA "=>"Ukraine ","UG "=>"Uganda ","UM "=>"United States Minor Outlying Islands ","US "=>"United States ","UY "=>"Uruguay ","UZ "=>"Uzbekistan ","VA "=>"Vatican City State (Holy See) ","VC "=>"St. Vincent & the Grenadines ","VE "=>"Venezuela ","VG "=>"British Virgin Islands ","VI "=>"United States Virgin Islands ","VN "=>"Viet Nam ","VU "=>"Vanuatu ","WF "=>"Wallis & Futuna Islands ","WS "=>"Samoa ","YD "=>"Democratic Yemen ","YE "=>"Yemen ","YT "=>"Mayotte ","YU "=>"Yugoslavia ","ZA "=>"South Africa ","ZM "=>"Zambia ","ZR "=>"Zaire ","ZW "=>"Zimbabwe ");
    
    
    asort($tableauPays);//  Trie le $tableauPays et conserve l'association des index
    //Appelle de la fonction que creer les options du select pays dans le formulaire meteo
    $optionsPays=creerOptionsPaysSelected($tableauPays,$paysChoisi);//Options du select pays actualisés

                       
    if(isset($_GET["formPays "]))//Validation si l'utilisateur a choisi un pays sur la liste des pays
    {   
        $paysChoisi=$tableauPays[$_GET["formPays "]]; // Afectacion de la variable $pays choisi avec le pays selectionné dans le formulaire
        
        //Extraction de tous le villes pour le pays stocke dans la variable $payChoisi
        $contenuVilles = file_get_contents("http://www.webservicex.net/globalweather.asmx/GetCitiesByCountry?CountryName=".urlencode($paysChoisi));

        if(isset($contenuVilles))//Validation si l'extraction des villes s'a fait correctement
        {
            $expRegVilles=" /(&lt;City&gt;)(.*)(&lt;\/City&gt;)/ ";
            $nbVilles=preg_match_all($expRegVilles, $contenuVilles, $tableauVilles, PREG_SET_ORDER);
            asort($tableauVilles);//  Trie le $tableauVilles et conserve l'association des index
            if($nbVilles==0)//Validation pour savoir combien des ville ont été extraies 
            {
                $villeChoisi="- ";
                $optionsVilles=creerOptionsVillesSelected($tableauVilles,$villeChoisi);//Options du select villes actualisés
                $message= "la Météo n 'est pas disponible pour cet pays.";
            }
            else{
                $optionsPays=creerOptionsPaysSelected($tableauPays,$paysChoisi);//Options du select pays actualisés
                $activerVilles="visibility:visible"; // affichage du select des villes dans le formulaire meteo
                $veuillezSelectVille = "<p>Veuillez sélectionnez une ville : </p>";// affichage du message séleccionnez une ville dans le formulaire meteo
                $optionsVilles=creerOptionsVillesSelected($tableauVilles,$villeChoisi);//Options du select villes actualisés
            }
        }//fin if
        else//Message de erreur quand l'extraction n'optienne pas des villes pour le pays choisi
        {
            $message= "Erreur d'extraction, Essayez plus tard, s 'il vous plait.";
        }
    }//fin if
            
    if(isset($_GET["formVilles"]))
    {
        if($_GET["formVilles"]!="-")
        {
            $optionsVilles="";
            $villeChoisi=$_GET["formVilles"];
            $optionsVilles=creerOptionsVillesSelected($tableauVilles,$villeChoisi);//Options du select villes actualisés
            //Extraction de la météo pour la ville et un pays specifique.
            $contenuMeteo=file_get_contents("http://www.webservicex.net/globalweather.asmx/GetWeather?CityName=".urlencode($villeChoisi)."&CountryName=".urlencode($tableauPays[$_GET["formPays"]]));
            if(isset($contenuMeteo))//Validation si le contenu de la météo a été bien fait
            {
                $meteoTime=afficherMeteo("tim",$contenuMeteo);//Appelle de la function afficherMeteo pour la date
                $meteoVent=afficherMeteo("ven",$contenuMeteo);//Appelle de la function afficherMeteo pour le vent
                $meteoVisib=afficherMeteo("vis",$contenuMeteo);//Appelle de la function afficherMeteo pour la visibilité
                $meteoTemp=afficherMeteo("tem",$contenuMeteo);//Appelle de la function afficherMeteo pour la temperature
                $meteoPres=afficherMeteo("pre",$contenuMeteo);//Appelle de la function afficherMeteo pour la pression
                $meteoRess=afficherMeteo("res",$contenuMeteo);//Appelle de la function afficherMeteo pour la ressentie


                //traitement de chainnes de character pour extraire l'information precise. 

                //**************** extraction Temperature en celsius ********************** 
                if($meteoTemp=='Temperature: Non disponible') 
                { 
                    $extraireTemp2=$meteoTemp; 
                } 
                else 
                { 
                    $activerImage="visibility:visible" ; 
                    $extraireTemp=substr($meteoTemp, 14) ; 
                    $extraireTemp=strstr($extraireTemp, ')', true); 
                } 

                //**************** extraction ressentie en celsius ********************** 

                if($meteoRess=='Ressentie: Non disponible') 
                { 
                    $extraireRess=$meteoRess;
                } 
                else 
                { 
                    $extraireRess=substr($meteoRess,18); 
                    $extraireRess=strstr($extraireRess, ')',true); 
                    $txtRes="Ressentie : "; 
                }

                //***************** extraction time (heur et date) ********************* 
                    $extraireTime=before( '/', $meteoTime); 
            } 
         }// fin if 
        else //Message de erreur quand l'extraction n'optienne pas de la météo
        { 
            $message="Erreur d'extraction, Essayez plus tard, s 'il vous plait.";
            $optionsVilles=creerOptionsVillesSelected($tableauVilles,$villeChoisi); 
        }  
    }// fin if
?>


<html>

    <head>
        <meta charset="utf-8">
        <title>La meteo</title>
        <link rel="stylesheet" type="text/css" href="styles/reset.css" />
        <link rel="stylesheet" type="text/css" href="styles/styles.css" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <h1>La météo</h1>
        
        <form method="GET" id="formulaire" name="meteo">
            <p> Veuillez sélectionnez un pays :</p>
            <select class="select1" name="formPays" onchange="this.form.submit()">
                <?php echo $optionsPays;?>
            </select>
            <?php echo $veuillezSelectVille ?>
            <select class="select2" name="formVilles" style="<?php echo $activerVilles; ?>" onchange="this.form.submit()">
                <?php echo $optionsVilles;?>
            </select>
            <p><?php echo $message; ?></p>
        </form>

        <div id="contenneurMessages">
            <div class="meteoTemp" style="<?php echo $activerImage; ?>"><?php echo $extraireTemp;?></div>
            <div class="meteoTime"><?php echo $extraireTemp2;?></div>
            <div class="meteoRess"><?php echo $txtRes . $extraireRess;?></div>
            <div class="meteoTime"><?php echo $extraireTime;?></div>
            <div class="contenneurMessages2">
                <div class="meteoVent"><?php echo $meteoVent;?></div>
                <div class="meteoVisib"><?php echo $meteoVisib;?></div>
                <div class="meteoPres"><?php echo $meteoPres;?></div>
            </div>
        </div>
    </body>

</html>