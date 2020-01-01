<?php

$ip1 = '192.168.1.1;

$tmpStr1 = 'http://'.$ip1.'/phpsysinfo/xml.php?plugin=complete&json';

$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);

$jsondata1 = file_get_contents($tmpStr1);

//converte l'oggetto json in array associativo php
$data1 = json_decode($jsondata1, true);

//CPU & HDD
$CPU_load = $data1['Vitals']['@attributes']['CPULoad'];
$CPU_avg  = $data1['Vitals']['@attributes']['LoadAvg'];
$Hdd_space_free = $data1['FileSystem']['Mount'][0]['@attributes']['Free'];
$Hdd_space_used = $data1['FileSystem']['Mount'][0]['@attributes']['Used'];
$Hdd_space_percent = $data1['FileSystem']['Mount'][0]['@attributes']['Percent'];

//Ora della Raspberry
$timestamp1 = $data1['Generation']['@attributes']['timestamp']; 
$oraserver1 = date("Y-m-d H:i:s", $timestamp1);

//Temperatura della CPU
$CpuTemp1 = $data1['MBInfo']['Temperature']['Item']['@attributes']['Value'];

//Durata di accensione del server
$SysUptime1 = $data1['Vitals']['@attributes']['Uptime'];

//UPTIME In formato d H:i:s
$SUTDaysX = gmdate("d H:i:s", $SysUptime);

//UPTIME in testo esteso
$days1 = floor($SysUptime1/86400);
$hours1 = floor(($SysUptime1-$days1*86400)/(60 * 60));
$min1 = floor(($SysUptime1-($days1*86400+$hours1*3600))/60);
$second1 = floor($SysUptime1 - ($days1*86400+$hours1*3600+$min1*60));

$SUTDays = '';

if($days1 > 0)  { $SUTDays1  = $days1.   " giorni ";}
if($hours1 > 0) { $SUTDays1 .= $hours1.  " ore ";}
if($min1 > 0)   { $SUTDays1 .= $min1.    " min. ";}

if($second1 > 0) $SUTDays = $SUTDays . $second1. " sec. ";
else $SUTDays = "poco fa";
