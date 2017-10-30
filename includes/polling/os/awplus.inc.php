<?php

//OS info - https://www.alliedtelesis.com/products/software/AlliedWare-Plus
//OS Datasheet - https://www.alliedtelesis.com/documents/datasheet-alliedware-plus

//$hardware and $serial use snmp_getnext as the OID for these is not always fixed.
//However, the first OID is the device baseboard. 

$hardware = trim(snmp_getnext($device, "rscBoardName", "-OQv", "AT-RESOURCE-MIB"), '"');
$version = trim(snmp_get($device, "currSoftVersion.0", "-OQv", "AT-SETUP-MIB"), '"');
$hostname = trim(snmp_get($device, "sysName.0", "-OQv", "SNMPv2-MIB"), '"');
$serial = trim(snmp_getnext($device, "rscBoardSerialNumber", "-OQv", "AT-RESOURCE-MIB"), '"');
