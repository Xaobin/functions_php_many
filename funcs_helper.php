<?php

if (! function_exists('encode_arr') ){
    function encode_arr($data) {
    return base64_encode(serialize($data));
}
}
if (! function_exists('decode_arr') ){
function decode_arr($data) {
    return unserialize(base64_decode($data));
}
}
//=============================================
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

//==============================================
function show_hide_button($con){
    $genid="div".getName(6);
    return 
    "<a class='btn btn-outline-secondary' data-toggle='collapse' href='#$genid' role='button' aria-expanded='false'>Show/Hide</a>
    <div class='collapse' id=$genid>
      <div class=card card-body  float-right>$con</div>
    </div>"
    ;
}
//==============================================
function gen_table_elems($str){
    $varr=[]; $onepart=""; $arr=[]; $c2=-1; $c3=-1;
  	if (substr_count($str,PHP_EOL)>=1){
  		$varr = explode(PHP_EOL, $str);
    }
    
    $cc=count($varr); $cc--; 
  for ($i=0;$i<=$cc; $i++){
    if (substr_count($varr[$i],"@@@")>0){
        $c2++;
        $arr[$c2]=$varr[$i];
    } else{
        $c3++;
        $onepart.=$varr[$i].PHP_EOL;
    }
  }  

  $rr="";
  $cc=count($arr); $cc--; 
  for ($i=0;$i<=$cc; $i++){
    
    if ((($i+1) % 2)!=0){
        $rr.="<div class='row'><div class='col-sm'>".get_link_one_foot($arr[$i],TRUE)."</div>";
    } else{
        $rr.="<div class='col-sm'>".get_link_one_foot($arr[$i],TRUE)."</div></div>";    
    }
  }
  if ((($cc+1) % 2)!=0){ $rr.="</div>"; }
   // $rr.="</div>";
    return $onepart.$rr;
}
//==============================================
function links_getter($txt){
  $minilink="";
  $sigg=FALSE;
  $mag1=substr_count($txt,"@@@http");
  $mag2=substr_count($txt,"http");
  if (($mag1==$mag2) and ($mag1>0)) {
    $sigg=TRUE;
    $txt=str_replace("@@@","\n",$txt);
  }
  $returned=""; $tmp=[]; $signalizator="&&&%%%&&&";
  $txt=str_replace("http",$signalizator."http",$txt);
  $txt=str_replace("\n","$signalizator\n",$txt);
  $txt=str_replace("\r","$signalizator\r",$txt);
    $txt=str_replace("file://",$signalizator."file://",$txt);
  ///*
  if (substr_count($txt,$signalizator)>=1){
    $arr = explode($signalizator, $txt);
    $txt=str_replace($signalizator,"",$txt);
    $cc=count($arr); $cc--;

  if (isset($arr)){
    $cc=count($arr); $cc--;
    for($i=0;$i<=$cc;$i++){
      $tmp=$arr[$i];

      if (strlen($tmp)>=10){
      if ( (substr_count($tmp,"http")>=1)OR(substr_count($tmp,"file://")>=1 ) ){
        $brk=[];
      if (substr_count($tmp," ")>=1){
        $brk=explode(" ",$tmp); $tmp=$brk[0]; $brk_cc=count($brk); $brk_cc--;
      }
        $minilink.="<a href='$tmp' target='_blank'><small>$tmp</small></a>";
      if ($sigg==TRUE)  {
        $minilink=get_link_one_foot($tmp,TRUE);
      }
      if (isset($brk_cc)){
        for($u=1;$u<=$brk_cc;$u++){
          if (isset($brk[$u])){
            $minilink.=" ".$brk[$u];
          }
        }
      }

        $arr[$i]=$minilink;
       
        $minilink="";
      }}

    }
  }}
  //here table_elems
 // if ($mag1>4){ $returned=table_elems($arr); }
 // else{
    if (isset($cc)){
    for($i=0;$i<=$cc;$i++){
        $returned.=$arr[$i];
    }}
  //}
  if ($returned==""){ $returned=$txt; }
    return $returned;
}

//====================================
function youtube_link($link,$width,$height){
  /*
<iframe width="749" height="419" src="https://www.youtube.com/embed/Q9pjWab8yiM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  */
  $ayy=[]; $lkk="";
   if (substr_count($link,"youtube.com")>=1){
      $link=str_replace("www.youtube.com/watch?v=","youtu.be/",$link);
  }
  if (substr_count($link,"youtu.be")>=1){
    $link=str_replace("youtu.be/","www.youtube.com/watch?v=",$link);
    $att=explode("tube.com/watch?v=",$link);
    if (isset($att[1])){
      $link="https://www.youtube.com/embed/".$att[1];
      $lkk="<iframe width='$width' height='$height' src='$link' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
    }
  }


return $lkk;
}
//====================================
function is_mobile_see(){
  $s=strtolower($_SERVER['HTTP_USER_AGENT']);
  $doid=FALSE;
      if ((  strstr($s,'android',false)!='')or( strstr($s,'iphone',false)!=''))  {

                  $doid=TRUE;
     }
     return $doid;
}
//====================================
 function get_link_one_foot($foot,$is_android){
  	$returned=""; //$preload=""; //
    $width="320"; $height="240";
    $farr=[];
    $elle=""; $ack=0;
    if (substr_count($foot,"@hide@")>=1) { $ack=1; }
    if (substr_count($foot,"@@@")>=1){
        $farr=explode("@@@",$foot);
        $foot=$farr[1];
        $elle=$farr[0]." - ";
    }
    if ($is_android==FALSE){ $width="853"; $height="480"; }
    $preload="preload='none'";
    $unolink="<br>$elle<a href='$foot' target='_blank'><b>_LINK_</b></a>";
    $filelink="<br>$elle<a href='$foot' target='_blank'><b>FILE_LINK</b></a>";
    $txtlink="<br>$elle<a href='".site_url('rtxt/'.base64_encode($foot))."' target='_blank'><b>TEXT_FILE_LINK</b></a>";

    $ext=".jpg.png.bmp.webp.jpeg.svg.gif";
    $ex=explode(".",$ext);
    $len=count($ex); $len--;
    //var_dump($ex);
      for ($i=1;$i<=$len;$i++){
        $form=".".$ex[$i];
       if (substr_count($foot,$form)>=1)  {
          	$returned="<img src='$foot' height='200' weight='200'>$filelink";
        }
     }
//if (strlen($returned)>=5){ echo "has returned"; }
     $ext=".mp3.ogg.m4a.wma";
     $ex=explode(".",$ext);
     $len=count($ex); $len--;
       for ($i=1;$i<=$len;$i++){
         $form=".".$ex[$i];
       if (strpos($foot,$form)!=null)  {
           $returned="<audio controls $preload>
       <source src='$foot' />
       
       </audio>$filelink";
         }
      }

      $ext=".mp4.webm.mkv.avi.mpg.mpeg";
      $ex=explode(".",$ext);
      $len=count($ex); $len--;
        for ($i=1;$i<=$len;$i++){
          $form=".".$ex[$i];
       if (strpos($foot,$form)!=null)  {
            $returned="<video width='$width' height='$height' controls>
        		 <source src='$foot' type='video/$ex[$i]'>
        		
        		</video>$filelink";
          }
       }

       $ext=".pdf.doc.docx.ppt.html.odt.ods.odp.sxw";
       $ex=explode(".",$ext);
       $len=count($ex); $len--;
         for ($i=1;$i<=$len;$i++){
           $form=".".$ex[$i];
           if (strpos($foot,$form)!=null)  {

             $returned=$filelink."<br>";
           }
        }

        $ext=".txt.txtm.rtf";
        $ex=explode(".",$ext);
        $len=count($ex); $len--;
          for ($i=1;$i<=$len;$i++){
            $form=".".$ex[$i];
            if (strpos($foot,$form)!=null)  {
 
              $returned=$txtlink."<br>";
            }
         }


    if (substr_count($foot,".webp")>=1){
    $returned="<picture><img src='$foot' height='200' weight='200'>$filelink"."</picture>";
    }
    if ((substr_count($foot,"youtube.com")>=1)or (substr_count($foot,"youtu.be")>=1) ){
  		$returned=youtube_link($foot,$width,$height).$filelink;
  	}

    if (($returned=="")and(substr_count($foot,"http")>=1) ){
      $returned=$unolink;
    } else{
    if (($returned=="")and(substr_count($foot,"file://")>=1) ){
      $returned=$unolink;
    } }

    if ($ack==1){
        $returned=str_replace("@hide@","",$returned);
        //$returned=str_replace("http","@@@http",$returned);
        //$returned=str_replace("<br>","",$returned);
        $returned=str_replace("\n","",$returned);
        $returned=str_replace("\r","",$returned);
        $returned=show_hide_button($returned);
    }

  	return $returned;
  }
//====================================
function get_links_footer($foots,$is_android){
  		$returned="";
  	if (substr_count($foots,PHP_EOL)>=1){
  		$arr = explode(PHP_EOL, $foots);

  	if (isset($arr)){
  		$cc=count($arr); $cc--;
  		for($i=0;$i<=$cc;$i++){
  			$returned.=get_link_one_foot($arr[$i],$is_android)."<br>";
  		}
  	}
  } else { $returned.=get_link_one_foot($foots,$is_android); }
  	return $returned;
  }
//====================================
if (! function_exists('decrypt_message')){
   function decrypt_message($mecrypt,$plaintext){
     $iv="�r�,l��$";
     $key="VeRSTucPVWrXBpexeNB2zVfU9QMMZeKv7qW";
    if ($mecrypt==0){
        $ciphertext= $plaintext;
    }
    if ($mecrypt==1){
      $cipher='AES-128-CBC';


      $ciphertext = openssl_decrypt($plaintext, $cipher, $key, $options=0,$iv);
    }
    if ($mecrypt==2){
      $cipher='AES-128-CFB';

      $ciphertext = openssl_decrypt($plaintext, $cipher, $key, $options=0,$iv);
    }
    if ($mecrypt==3){
      $cipher='AES-128-CFB1';


      $ciphertext = openssl_decrypt($plaintext, $cipher, $key, $options=0,$iv);
    }
    if ($mecrypt==4){
      $cipher='AES-128-CFB8';


      $ciphertext = openssl_decrypt($plaintext, $cipher, $key, $options=0,$iv);
    }
    if ($mecrypt==5){
      $cipher='AES-128-OFB';


      $ciphertext = openssl_decrypt($plaintext, $cipher, $key, $options=0,$iv);
    }
    return 	$ciphertext;
  }
}
//function to get what page is the message ... or texto
//====================================
  if ( ! function_exists('sys_get_page_message')){
        function sys_get_page_message($meid, $arrx,$limit){
          $cont=0; $tmv='';
          $getpage=1;
          foreach ($arrx as $msg):
          if (isset($msg['meid'])) { $tmv="meid"; }
            else { $tmv='teid'; }
            if ($msg[$tmv]==$meid){
              return $getpage;
              break;
            }
            $cont++;
            if ($cont==$limit){
              $getpage++;
              $cont=0;
            }
          endforeach;
        }
    }
//====================================
?>
