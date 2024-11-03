<?php
namespace App\Controllers;

class Ct_oth extends BaseController{

  public function __construct() {

    $secObj = new \App\Models\classes\Security_class();
			$secObj->security_step();
		}
//===============================
  public function gtrix(){
    $tt['title']="Gtrix";
      echo view('layout/head',$tt);
      echo view('layout/navbar2');
      //$this->parser->parse('thetopic', $vard);
      echo view('app/oth/gtrix');
      echo view('layout/footer');
  }
  //===============================
  public function gemodo(){
    $tt['title']="Gemmodo";
      echo view('layout/head',$tt);
      echo view('layout/navbar2');
      //$this->parser->parse('thetopic', $vard);
      echo view('app/oth/gmodo');
      echo view('layout/footer');
  }
//===============================
public function other(){

    $tt['title']="Other Options";
    echo view('layout/head',$tt);
echo view('layout/navbar2');
//$this->parser->parse('thetopic', $vard);
echo view('app/oth/oth_opt');
echo view('layout/footer');
}
//===============================
public function view_text($tx){
    header("Content-type: text/html; charset=utf-8"); 
    $tx=base64_decode($tx);
    //echo $tx;
    $file = file_get_contents($tx, true);
    
   // echo view('app/oth/oth_txt',$file);
   $tt['title']=$tx;
   $fx['afile']=$file;
   echo view('layout/head',$tt);
  // echo nl2br($file);
   echo view('app/oth/v_txt',$fx);
   //echo view('layout/footer'); 
      
}
//===============================
private function getNameWithoutPoint($name){
    $cc=strlen($name); $cc--;
    $aa="";
    
      if (substr_count($name, ".")>=1){
          $ar=explode(".",$name);
          $aa=substr( $ar[0],0,strlen($ar[0])-1 );
      }
      if ($aa==""){ return $name; }
      return $aa;
}
//===============================
public function gemodo_calc(){
     $inp=$this->inputs_plus();
     $sumTotal=0;
     if ($inp['sum1']!=""){ $sumTotal+=(integer)$inp['sum1']; }
     if ($inp['sum2']!=""){ $sumTotal+=(integer)$inp['sum2']; }
     if ($inp['sum3']!=""){ $sumTotal+=(integer)$inp['sum3']; }
     if ($inp['sum4']!=""){ $sumTotal+=(integer)$inp['sum4']; }
     if ($inp['vals']!=""){ $txtInputVal=$inp['vals']; }


     $arrI=array('0'=>'zero','1'=>'um','2'=>'dois','3'=>'tres','4'=>'quatro','5'=>'cinco','6'=>'seis','7'=>'sete','8'=>'oito','9'=>'nove','10'=>'dez','11'=>'onze','12'=>'doze','13'=>'treze','14'=>'catorze','15'=>'quinze','16'=>'dezesseis','17'=>'dezessete','18'=>'dezoito','19'=>'dezenove');

     $arrII=array('20'=>'vinte','21'=>'vinte um','22'=>'vinte dois','23'=>'vinte tres','24'=>'vinte quatro','25'=>'vinte cinco','26'=>'vinte seis','27'=>'vinte sete','28'=>'vinte oito','29'=>'vinte nove');

     $arrIII=array('30'=>'trinta','31'=>'trinta um','32'=>'trinta dois','33'=>'trinta tres','34'=>'trinta quatro','35'=>'trinta cinco','36'=>'trinta seis','37'=>'trinta sete','38'=>'trinta oito','39'=>'trinta nove');

     $arrIV=array('40'=>'quarenta','41'=>'quarenta um','42'=>'quarenta dois','43'=>'quarenta tres','44'=>'quarenta quatro','45'=>'quarenta cinco','46'=>'quarenta seis','47'=>'quarenta sete','48'=>'quarenta oito','49'=>'quarenta nove');

     $arrV=array('50'=>'cinquenta','51'=>'cinquenta um','52'=>'cinquenta dois','53'=>'cinquenta tres','54'=>'cinquenta quatro','55'=>'cinquenta cinco','56'=>'cinquenta seis','57'=>'cinquenta sete','58'=>'cinquenta oito','59'=>'cinquenta nove');

     $arrVI=array('60'=>'sessenta','61'=>'sessenta um','62'=>'sessenta dois','63'=>'sessenta tres','64'=>'sessenta quatro','65'=>'sessenta cinco','66'=>'sessenta seis','67'=>'sessenta sete','68'=>'sessenta oito','69'=>'sessenta nove');

     $arrVII=array('70'=>'setenta','71'=>'setenta um','72'=>'setenta dois','73'=>'setenta tres','74'=>'setenta quatro','75'=>'setenta cinco','76'=>'setenta seis','77'=>'setenta sete','78'=>'setenta oito','79'=>'setenta nove');

     $arrVIII=array('80'=>'oitenta','81'=>'oitenta um','82'=>'oitenta dois','83'=>'oitenta tres','84'=>'oitenta quatro','85'=>'oitenta cinco','86'=>'oitenta seis','87'=>'oitenta sete','88'=>'oitenta oito','89'=>'oitenta nove');

     $arrIX=array('90'=>'noventa','91'=>'noventa um','92'=>'noventa dois','93'=>'noventa tres','94'=>'noventa quatro','95'=>'noventa cinco','96'=>'noventa seis','97'=>'noventa sete','98'=>'noventa oito','99'=>'noventa nove');

     $alphaArray=array_merge($arrI,$arrII,$arrIII,$arrIV,$arrV,$arrVI,$arrVII,$arrVIII,$arrIX);
     $numTxtInputVal=$this->calcJewGema($txtInputVal);
     $somatorium=$numTxtInputVal+$sumTotal;
     $gemCalc="";
     $vrd['results']="<span> $txtInputVal - $numTxtInputVal </span><br>";
     $vrd['results'].="<span> Soma - $sumTotal </span><br>";
     $gemCalc=$this->calcGemNumbers($alphaArray,$somatorium,'Resultado');
     $table="<table class='table-bordered'>";
     $tableEnd="</table><br>";
     $vrd['results'].=$table.$gemCalc.$tableEnd;
     
     $tt['title']="...Gemmodo...";
     $vrd['sum1']=$inp['sum1'];
     $vrd['sum2']=$inp['sum2'];
     $vrd['sum3']=$inp['sum3'];
     $vrd['sum4']=$inp['sum4'];
     $vrd['vals']=$inp['vals'];

     echo view('layout/head',$tt);
     echo view('layout/navbar2');
     //$this->parser->parse('thetopic', $vard);
     echo view('app/oth/gmodo',$vrd);
     echo view('layout/footer');
}
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================

  public function gtrix_calc(){
//Kartal S.– us Mandlik E.1:2 
// -
// –
    $inp=$this->inputs_plus();

    $vard=[];
    $arr=[];
    $arr[0]=""; $arr[1]="";
    $vard="";
    $ga0=0; $gb0=0; $gc0=0; $gd0=0; $ge0=0;
    $ga1=0; $gb1=0; $gc1=0; $gd1=0; $ge1=0;
    $va=""; $vb="";
    $neova=""; $neovb="";
    $sumTotal=0;
    if ($inp['sum1']!=""){ $sumTotal+=(integer)$inp['sum1']; }
    if ($inp['sum2']!=""){ $sumTotal+=(integer)$inp['sum2']; }
    if ($inp['sum3']!=""){ $sumTotal+=(integer)$inp['sum3']; }
    if ($inp['sum4']!=""){ $sumTotal+=(integer)$inp['sum4']; }
    $resulter="<table class='table-bordered'><tr>";
    $resulter.="<td>Gematrias/Values</td><td>Simple</td><td>English</td><td>Jewish</td><td>Pytagoric</td><td>Chaldean</td></tr>";
    $str=$inp['vals'];
    if ( (substr_count($str,'–')>0) ){


        $str=str_replace("–","-",$str);

    }
    //----------
    if ( ($inp['divider']==1)and(substr_count($str,' - ')>0) ){
                $arr=explode(" - ",$str);


         if ( ($arr[1][2]==" ")and($arr[1][0]==strtolower($arr[1][0])) ){
            $cc1=strlen($arr[1]);
            $neo="";
             for ($k=3;$k<=$cc1-1;$k++){
                 $neo=$neo.$arr[1][$k];
             }
          $str=$arr[0]." - ".$neo;
          $arr=explode(" - ",$str);
         }
         $neoarr=[];
         $neoarr[0]=$this->getNameWithoutPoint($arr[0]);
         $neoarr[1]=$this->getNameWithoutPoint($arr[1]);
         $str.= " <".$neoarr[0].">"." <".$neoarr[1].">";
         
          //....................................
                $ga0=$this->calcSimpleGema($arr[0]); 
                $gb0=$this->calcEngGema($arr[0]);
                $gc0=$this->calcJewGema($arr[0]); 
                $gd0=$this->calcPytGema($arr[0]);
                $ge0=$this->calcChalGema($arr[0]);

                $ga1=$this->calcSimpleGema($arr[1]); 
                $gb1=$this->calcEngGema($arr[1]);
                $gc1=$this->calcJewGema($arr[1]); 
                $gd1=$this->calcPytGema($arr[1]);
                $ge1=$this->calcChalGema($arr[1]);
         //....................................
                $ha0=$this->calcSimpleGema($neoarr[0]); 
                $hb0=$this->calcEngGema($neoarr[0]);
                $hc0=$this->calcJewGema($neoarr[0]); 
                $hd0=$this->calcPytGema($neoarr[0]);
                $he0=$this->calcChalGema($neoarr[0]);

                $ha1=$this->calcSimpleGema($neoarr[1]); 
                $hb1=$this->calcEngGema($neoarr[1]);
                $hc1=$this->calcJewGema($neoarr[1]); 
                $hd1=$this->calcPytGema($neoarr[1]);
                $he1=$this->calcChalGema($neoarr[1]);
        //.......................................        
             $resulter.="<tr>";
             $resulter.="<td>".$arr[0]."</td>";
             $resulter.="<td>$ga0</td>";
             $resulter.="<td>$gb0</td>";
             $resulter.="<td>$gc0</td>";
             $resulter.="<td>$gd0</td>";
             $resulter.="<td>$ge0</td></tr>";

             $resulter.="<tr>";
             $resulter.="<td>".$arr[1]."</td>";
             $resulter.="<td>$ga1</td>";
             $resulter.="<td>$gb1</td>";
             $resulter.="<td>$gc1</td>";
             $resulter.="<td>$gd1</td>";
             $resulter.="<td>$ge1</td></tr>";
             $resulter.="</table><br>";
          
   $va.=$arr[0]." >> ".$ga0." - ".$gb0." - ".$gc0." - ".$gd0." - ".$ge0."".PHP_EOL;
   $vb.=$arr[1]." >> ".$ga1." - ".$gb1." - ".$gc1." - ".$gd1." - ".$ge1."".PHP_EOL;
        if ($sumTotal>0){
        //................................
        $ga0+=$sumTotal;   $ga1+=$sumTotal; 
        $gb0+=$sumTotal;   $gb1+=$sumTotal; 
        $gc0+=$sumTotal;   $gc1+=$sumTotal; 
        $gd0+=$sumTotal;   $gd1+=$sumTotal;
        $ge0+=$sumTotal;   $ge1+=$sumTotal;
        //................................
        $ha0+=$sumTotal;   $ha1+=$sumTotal; 
        $hb0+=$sumTotal;   $hb1+=$sumTotal; 
        $hc0+=$sumTotal;   $hc1+=$sumTotal; 
        $hd0+=$sumTotal;   $hd1+=$sumTotal;
        $he0+=$sumTotal;   $he1+=$sumTotal;
        //................................
        $neova=" NeonSum: ".$ga0." - ".$gb0." - ".$gc0."[".$this->calcSumsEx9($gc0)."]"." - ".$gd0."[".$this->calcSumsEx9($gd0)."]"." - ".$ge0."".PHP_EOL;
          
        $neovb=" NeonSum: ".$ga1." - ".$gb1." - ".$gc1."[".$this->calcSumsEx9($gc1)."]"." - ".$gd1."[".$this->calcSumsEx9($gd1)."]"." - ".$ge1."".PHP_EOL;
        }
        //................................
        $neoka=" NeonSumK: ".$ha0." - ".$hb0." - ".$hc0."[".$this->calcSumsEx9($hc0)."]"." - ".$hd0."[".$this->calcSumsEx9($hd0)."]"." - ".$he0."__".$this->calcSumsIn2($hc0)."".PHP_EOL;
          
        $neokb=" NeonSumK: ".$ha1." - ".$hb1." - ".$hc1."[".$this->calcSumsEx9($hc1)."]"." - ".$hd1."[".$this->calcSumsEx9($hd1)."]"." - ".$he1."__".$this->calcSumsIn2($hc1)."".PHP_EOL;
        //................................
    }
    //------------------
         if ($inp['divider']==3){

               $ga0=$this->calcSimpleGema($str); $gb0=$this->calcEngGema($str);
                $gc0=$this->calcJewGema($str);   $gd0=$this->calcPytGema($str);
                $ge0=$this->calcChalGema($str);
                $resulter="";
          $resulter.="Simple gematria of $str is $ga0 <br>";
                $resulter.="English gematria of $str is $gb0 <br>";
                $resulter.="Jewish gematria of  $str is  $gc0 <br>";
                $resulter.="Pytagoric gematria of $str is $gd0 <br>";
                $resulter.="Chaldean gematria of $str is $ge0 <br>";
                 $va.=$arr[0]." >> ".$ga0." - ".$gb0." - ".$gc0."".PHP_EOL;
        if ($sumTotal>0){
        $ga0+=$sumTotal; $gb0+=$sumTotal; $gc0+=$sumTotal; $gd0+=$sumTotal;
        $ge0+=$sumTotal;
        $neova=" Neo Sums: ".$ga0." - ".$gb0." - ".$gc0." - ".$gd0." - ".$ge0."".PHP_EOL;
        }

    }
    //-----------------------
    if ( ($inp['divider']==2)and(substr_count($str,':')>0) ){
          $arr=explode(":",$str);
          $arr[0]=$this->removeParNum($arr[0]);
          $arr[1]=$this->removeParNum($arr[1]);
          $ga0=$this->calcSimpleGema($arr[0]); $gb0=$this->calcEngGema($arr[0]);
          $gc0=$this->calcJewGema($arr[0]); $gd0=$this->calcPytGema($arr[0]);
          $ge0=$this->calcChalGema($arr[0]);

          $ga1=$this->calcSimpleGema($arr[1]); $gb1=$this->calcEngGema($arr[1]);
          $gc1=$this->calcJewGema($arr[1]);   $gd1=$this->calcPytGema($arr[1]);
          $ge1=$this->calcChalGema($arr[1]);
          $resulter.="<tr>";
             $resulter.="<td>".$arr[0]."</td>";
             $resulter.="<td>$ga0</td>";
             $resulter.="<td>$gb0</td>";
             $resulter.="<td>$gc0</td>";
             $resulter.="<td>$gd0</td>";
             $resulter.="<td>$ge0</td></tr>";

             $resulter.="<tr>";
             $resulter.="<td>".$arr[1]."</td>";
             $resulter.="<td>$ga1</td>";
             $resulter.="<td>$gb1</td>";
             $resulter.="<td>$gc1</td>";
             $resulter.="<td>$gd1</td>";
             $resulter.="<td>$ge1</td></tr>";
             $resulter.="</table><br>";
             $va.=$arr[0]." >> ".$ga0." - ".$gb0." - ".$gc0." - ".$gd0." - ".$ge0."".PHP_EOL;
             $vb.=$arr[1]." >> ".$ga1." - ".$gb1." - ".$gc1." - ".$gd1." - ".$ge1."".PHP_EOL;
                  if ($sumTotal>0){
                  $ga0+=$sumTotal; $gb0+=$sumTotal; $gc0+=$sumTotal; $gd0+=$sumTotal;
                  $ge0+=$sumTotal;
                  $neova=" Neo Sums: ".$ga0." - ".$gb0." - ".$gc0." - ".$gd0." - ".$ge0."".PHP_EOL;
                    $ga1+=$sumTotal; $gb1+=$sumTotal; $gc1+=$sumTotal; $gd1+=$sumTotal;
                    $ge1+=$sumTotal;
                  $neovb=" Neo Sums: ".$ga1." - ".$gb1." - ".$gc1." - ".$gd1." - ".$ge1."".PHP_EOL;
                  }
    }
    //---------------
     $tt['title']="Calc. Gematria";
    //$vrd['vlx']="";
     $vrd['results2']="";
     //$vrd['results2'].=$str."".PHP_EOL.$va.$vb.$neova.$neovb."".PHP_EOL;
     $vrd['results2'].=$str."".PHP_EOL.$neova.$neovb.$neoka.$neokb."".PHP_EOL; 
    $vrd['results2'].=htmlspecialchars($inp['tyrea'])."".PHP_EOL;
    $vrd['results']=$resulter;

    $vrd['sum1']=$inp['sum1'];
    $vrd['sum2']=$inp['sum2'];
    $vrd['sum3']=$inp['sum3'];
    $vrd['sum4']=$inp['sum4'];
    $vrd['vals']=$inp['vals'];

    //echo "<br>".print_r($inp);

    echo view('layout/head',$tt);
echo view('layout/navbar2');
//$this->parser->parse('thetopic', $vard);
echo view('app/oth/gtrix',$vrd);
echo view('layout/footer');
  }
//===============================
private function getNumJewGema($c)
{
     $c=strtolower($c);
     if ($c=='a')  { return 1; }
          if ($c=='b')  { return 2; }
               if ($c=='c')  { return 3; }
                    if ($c=='d')  { return 4; }
     if ($c=='e')  { return 5; }
          if ($c=='f')  { return 6; }
               if ($c=='g')  { return 7; }
                    if ($c=='h')  { return 8; }
     if ($c=='i')  { return 9; }
          if ($c=='j')  { return 600; }
               if ($c=='k')  { return 10; }
                    if ($c=='l')  { return 20; }
     if ($c=='m')  { return 30; }
          if ($c=='n')  { return 40; }
               if ($c=='o')  { return 50; }
                    if ($c=='p')  { return 60; }

     if ($c=='q')  { return 70; }
          if ($c=='r')  { return 80; }
               if ($c=='s')  { return 90; }
                    if ($c=='t')  { return 100; }
     if ($c=='u')  { return 200; }
          if ($c=='v')  { return 700; }
               if ($c=='w')  { return 900; }
                    if ($c=='x')  { return 300; }
     if ($c=='y')  { return 400; }
          if ($c=='z')  { return 500; }

}
//===============================
private function calcJewGema($str){
  $cc=strlen($str); $cc--;
  $aa=0;
    for($i=0;$i<=$cc;$i++){
        $aa+=$this->getNumJewGema($str[$i]);
    }
    return $aa;
}
//===============================
private function getNumEngGema($c)
{
     $c=strtolower($c);
     if ($c=='a')  { return 6; };
          if ($c=='b')  { return 12; };
               if ($c=='c')  { return 18; };
                    if ($c=='d')  { return 24; };
     if ($c=='e')  { return 30; };
          if ($c=='f')  { return 36; };
               if ($c=='g')  { return 42; };
                    if ($c=='h')  { return 48; };
     if ($c=='i')  { return 54; };
          if ($c=='j')  { return 60; };
               if ($c=='k')  { return 66; };
                    if ($c=='l')  { return 72; };
     if ($c=='m')  { return 78; };
          if ($c=='n')  { return 84; };
               if ($c=='o')  { return 90; };
                    if ($c=='p')  { return 96; };

     if ($c=='q')  { return 102; };
          if ($c=='r')  { return 108; };
               if ($c=='s')  { return 114; };
                    if ($c=='t')  { return 120; };
     if ($c=='u')  { return 126; };
          if ($c=='v')  { return 132; };
               if ($c=='w')  { return 138; };
                    if ($c=='x')  { return 144; };
     if ($c=='y')  { return 150; };
          if ($c=='z')  { return 156; };

}
//===============================
private function calcEngGema($str){
  $cc=strlen($str); $cc--;
  $aa=0;
    for($i=0;$i<=$cc;$i++){
        $aa+=$this->getNumEngGema($str[$i]);
    }
    return $aa;
}
//===============================
private function getNumSimpleGem($c)
{
     $c=strtolower($c);
     if ($c=='a')  { return 1; };
          if ($c=='b')  { return 2; };
               if ($c=='$c')  { return 3; };
                    if ($c=='d')  { return 4; };
     if ($c=='e')  { return 5; };
          if ($c=='f')  { return 6; };
               if ($c=='g')  { return 7; };
                    if ($c=='h')  { return 8; };
     if ($c=='i')  { return 9; };
          if ($c=='j')  { return 10; };
               if ($c=='k')  { return 11; };
                    if ($c=='l')  { return 12; };
     if ($c=='m')  { return 13; };
          if ($c=='n')  { return 14; };
               if ($c=='o')  { return 15; };
                    if ($c=='p')  { return 16; };

     if ($c=='q')  { return 17; };
          if ($c=='r')  { return 18; };
               if ($c=='s')  { return 19; };
                    if ($c=='t')  { return 20; };
     if ($c=='u')  { return 21; };
          if ($c=='v')  { return 22; };
               if ($c=='w')  { return 23; };
                    if ($c=='x')  { return 24; };
     if ($c=='y')  { return 25; };
          if ($c=='z')  { return 26; };

}
//===============================
private function calcSimpleGema($str){
  $cc=strlen($str); $cc--;
  $aa=0;
    for($i=0;$i<=$cc;$i++){
        $aa+=$this->getNumSimpleGem($str[$i]);
    }
    return $aa;
}
//===============================
//===========================================
private function have_post($myinput){
	$ret="";
	if (isset($_POST[$myinput])){
		$ret=$this->request->getPost($myinput);
	}
	return $ret;
}
//===========================================
private function inputs_plus(){

	$inputs=[];

	$inputs['vals']=$this->have_post('vals');
	$inputs['divider']=$this->have_post('divider');
	$inputs['tyrea']=$this->have_post('tyrea');
    	$inputs['sum1']=$this->have_post('sum1');
     $inputs['sum2']=$this->have_post('sum2');
     $inputs['sum3']=$this->have_post('sum3');
     $inputs['sum4']=$this->have_post('sum4');

	return $inputs;
}
//===============================
private function removeParNum($str){
     $str=str_replace("(","",$str);
     $str=str_replace(")","",$str);
     $str=str_replace(":","",$str);
     $str=str_replace("-","",$str);
     $str=str_replace("1","",$str);
     $str=str_replace("2","",$str);
     $str=str_replace("3","",$str);
     $str=str_replace("4","",$str);
     $str=str_replace("5","",$str);
     $str=str_replace("6","",$str);
     $str=str_replace("7","",$str);
     $str=str_replace("8","",$str);
     $str=str_replace("9","",$str);
     $str=str_replace("10","",$str);
     $str=str_replace("0","",$str);
     $str=str_replace(",","",$str);
     return $str;
}
//===============================
private function getNumPytagoricGem($c)
{
     $c=strtolower($c);
     if ($c=='a') { return 1;  }
          if ($c=='b') { return 2;  }
               if ($c=='c') { return 3;  }
                    if ($c=='d') { return 4;  }
     if ($c=='e') { return 5;  }
          if ($c=='f') { return 6;  }
               if ($c=='g') { return 7;  }
                    if ($c=='h') { return 8;  }
     if ($c=='i') { return 9;  }
          if ($c=='j') { return 1;  }
               if ($c=='k') { return 2;  }
                    if ($c=='l') { return 3;  }
     if ($c=='m') { return 4;  }
          if ($c=='n') { return 5;  }
               if ($c=='o') { return 6;  }
                    if ($c=='p') { return 7;  }

     if ($c=='q') { return 8;  }
          if ($c=='r') { return 9;  }
               if ($c=='s') { return 1;  }
                    if ($c=='t') { return 2;  }
     if ($c=='u') { return 3;  }
          if ($c=='v') { return 4;  }
               if ($c=='w') { return 5;  }
                    if ($c=='x') { return 6;  }
     if ($c=='y') { return 7;  }
          if ($c=='z') { return 8;  }

}

//===============================
private function getNumChaldeanGem($c)
{
     $c=strtolower($c);
     if ($c=='a') { return 1;  }
          if ($c=='b') { return 2;  }
               if ($c=='c') { return 3;  }
                    if ($c=='d') { return 4;  }
     if ($c=='e') { return 5;  }
          if ($c=='f') { return 8;  }
               if ($c=='g') { return 3;  }
                    if ($c=='h') { return 5;  }
     if ($c=='i') { return 1;  }
          if ($c=='j') { return 1;  }
               if ($c=='k') { return 2;  }
                    if ($c=='l') { return 3;  }
     if ($c=='m') { return 4;  }
          if ($c=='n') { return 5;  }
               if ($c=='o') { return 7;  }
                    if ($c=='p') { return 8;  }

     if ($c=='q') { return 1;  }
          if ($c=='r') { return 2;  }
               if ($c=='s') { return 3;  }
                    if ($c=='t') { return 4;  }
     if ($c=='u') { return 6;  }
          if ($c=='v') { return 6;  }
               if ($c=='w') { return 6;  }
                    if ($c=='x') { return 5;  }
     if ($c=='y') { return 1;  }
          if ($c=='z') { return 7;  }

}
//===============================
private function calcPytGema($str){
     $cc=strlen($str); $cc--;
     $aa=0;
       for($i=0;$i<=$cc;$i++){
           $aa+=$this->getNumPytagoricGem($str[$i]);
       }
       return $aa;
   }
//===============================
private function calcChalGema($str){
     $cc=strlen($str); $cc--;
     $aa=0;
       for($i=0;$i<=$cc;$i++){
           $aa+=$this->getNumChaldeanGem($str[$i]);
       }
       return $aa;
   }
//===============================
private function calcSumsEx9($str){
$sums=0;
$str=(string)$str;
$cc=strlen($str); $cc--;
	for($i=0;$i<=$cc;$i++){
		 if ((int)$str[$i]!="9"){
           $sums+=(int)$str[$i];
		}
     }
return $sums;
}
//===============================
private function calcSumsIn2($str){
     $sums=0;
     $str=(string)$str;
     $ck=strlen($str);
     $reth="";
     $sm22=0;
     if ($ck==4){
          $stA=$str[0].$str[1];
          $stB=$str[2].$str[3];
          $sums=(int)$stA+(int)$stB;
          //$sums=$stA."_+_".$stB;
     }
     if ($ck==3){
          $stA=$str[0];
          $stB=$str[1].$str[2];
          $sums=(int)$stA+(int)$stB;
     }
     if ($ck<=2){
          
          $sums=(int)$str;
     }
   if ($sums>22){
     $sm22=$sums % 22;
     $reth=(string)$sums."__m22__".(string)($sm22);
     return "|".$reth."|";
   }
     return $sums;
     }
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================

//===============================
private function calcGemNumbers($arr,$sum,$result='Result'){
   
     $tr="<tr>"; $endTr="</tr>";
     $td="<td>"; $endTd="</td>";
    // $tagAberta=false;
    $class="<span class='btn-outline-info'>";
    $endClass="</span>";
     $nn=0; 
     $tmpGem=0;
     $sumDeDois='';
     $acumul=$tr;
     foreach ($arr as $key => $value) {
          $nn++;
          $tmpGem=$this->calcJewGema($value);
          $acumul.=$td;
          $acumul.=$class.$key."-".$value."";
          $acumul.=" (".$tmpGem.")".$endClass."<br>";
          $tmpGem+=$sum;
          $sumDeDois=$this->calcSumsIn2((string)$tmpGem);
          $acumul.="".$result.": ".(string)$tmpGem."<br>".$sumDeDois."";
          $acumul.=$endTd;
          $tmpGem=0;
          if (($nn % 3)==0) {$acumul.=$endTr.$tr;   }
      }
      $acumul.=$endTr;
      return $acumul;
}
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
//===============================
}
