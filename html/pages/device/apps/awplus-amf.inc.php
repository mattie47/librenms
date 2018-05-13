<?php
/*
 * LibreNMS module to capture statistics from the AT-ATMF-MIB
 *
 * Copyright (c) 2018 Matt Read <matt.read@alliedtelesis.co.nz>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

$component = new LibreNMS\Component();
$options = array();
$options['filter']['ignore'] = array('=',0);
$options['type'] = 'awplus-amf';
$components = $component->getComponents($device['device_id'], $options);
$components = $components[$device['device_id']];

global $config;
?>
<table id='table' class='table table-condensed table-responsive table-striped'>
    <thead>
    <tr>
        <th>Node name</th>
        <th>AMF Status</th>
        <th>Role</th>
        <th>Network Name</th>
        <th>Parent Name</th>
        <th>Core Distance</th>
        <th>Domain ID</th>
        <th>Restricted Login</th>
        <th>Nodes</th>
        <th>Area Name</th>
        <th></th>
    </tr>
    </thead>
<?php
foreach ($components as $amf) {
//    $string = $peer['peer'].":".$peer['port'];

    if ($amf['status'] == 1) {
        $status = 'Disabled';
    } elseif ($amf['status'] == 2) {
        $status = 'Enabled';
    }

    if ($amf['role'] == 1) {
        $role = 'Member';
    } elseif ($amf['role'] == 2) {
        $role = 'Master';
    }


    if ($amf['restrictedlogin'] == 1) {
        $amf['restrictedlogin'] = 'Disabled';
    } elseif ($amf['restrictedlogin'] == 2) {
        $amf['restrictedlogin'] = 'Enabled';
    }

?>
<tr <?php echo $error; ?>>
<td><?php echo $amf['nodename']; ?></td>
<td><?php echo $status; ?></td>
<td><?php echo $role; ?></td>
<td><?php echo $amf['networkname']; ?></td>
<td><?php echo $amf['parentname']; ?></td>
<td><?php echo $amf['coredistance']; ?></td>
<td><?php echo $amf['domainid']; ?></td>
<td><?php echo $amf['restrictedlogin']; ?></td>
<td><?php echo $amf['nodes']; ?></td>
<td><?php echo $amf['controllerrole'];; ?></td>
</tr>
<?php
}
?>
</table>


<!--

$result['nodename'] = $atAtmfSummary['atAtmfSummaryNodeName.0'];
$result['status'] = $atAtmfSummary['atAtmfSummaryStatus.0'];
$result['role'] = $atAtmfSummary['atAtmfSummaryRole.0'];
$result['networkname'] = $atAtmfSummary['atAtmfSummaryNetworkName.0'];
$result['parentname'] = $atAtmfSummary['atAtmfSummaryParentName.0'];
$result['coredistance'] = $atAtmfSummary['atAtmfSummaryCoreDistance.0'];
$result['domainid'] = $atAtmfSummary['atAtmfSummaryDomainId.0'];
$result['restrictedlogin'] = $atAtmfSummary['atAtmfSummaryRestrictedLogin.0'];
$result['nodes'] = $atAtmfSummary['atAtmfSummaryNodes.0'];
$result['controllerrole'] = $atAtmfSummary['atAtmfSummaryControllerRole.0'];
/*





/*
<div class="panel panel-default" id="stratum">
    <div class="panel-heading">
        <h3 class="panel-title">NTP Stratum</h3>
    </div>
    <div class="panel-body">
        <?php

        $graph_array = array();
        $graph_array['device'] = $device['device_id'];
        $graph_array['height'] = '100';
        $graph_array['width']  = '215';
        $graph_array['to']     = $config['time']['now'];
        $graph_array['type']   = 'device_ntp_stratum';
        require 'includes/print-graphrow.inc.php';

        ?>
    </div>
</div>

<div class="panel panel-default" id="offset">
    <div class="panel-heading">
        <h3 class="panel-title">Offset</h3>
    </div>
    <div class="panel-body">
        <?php

        $graph_array = array();
        $graph_array['device'] = $device['device_id'];
        $graph_array['height'] = '100';
        $graph_array['width']  = '215';
        $graph_array['to']     = $config['time']['now'];
        $graph_array['type']   = 'device_ntp_offset';
        require 'includes/print-graphrow.inc.php';

        ?>
    </div>
</div>

<div class="panel panel-default" id="delay">
    <div class="panel-heading">
        <h3 class="panel-title">Delay</h3>
    </div>
    <div class="panel-body">
        <?php

        $graph_array = array();
        $graph_array['device'] = $device['device_id'];
        $graph_array['height'] = '100';
        $graph_array['width']  = '215';
        $graph_array['to']     = $config['time']['now'];
        $graph_array['type']   = 'device_ntp_delay';
        require 'includes/print-graphrow.inc.php';

        ?>
    </div>
</div>
*/
<div class="panel panel-default" id="dispersion">
    <div class="panel-heading">
        <h3 class="panel-title">Dispersion</h3>
    </div>
    <div class="panel-body">
        <?php

        $graph_array = array();
        $graph_array['device'] = $device['device_id'];
        $graph_array['height'] = '100';
        $graph_array['width']  = '215';
        $graph_array['to']     = $config['time']['now'];
        $graph_array['type']   = 'device_ntp_dispersion';
        require 'includes/print-graphrow.inc.php';

        ?>
    </div>
</div>
-->
