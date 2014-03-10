<?php

function launch_vm($image, $vlan, $name, $ip, $cpu, $memory, $disk_inc)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/launch_vm.sh '$username' '$image' '$vlan' '' '$name' '$ip' '$cpu' '$memory' '$disk_inc'", $dm_info);
    return $dm_info;
}

function clear_vm($vm_ID)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/clear_vm.sh $username $vm_ID", $dm_info);
    return $dm_info;
}

function attach_nic($vm_ID, $vlan)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/attach_nic.sh $username $vm_ID $vlan", $dm_info);
    return $dm_info;
}

function attach_vol($vm_ID, $volume)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/attach_vol.sh $username $vm_ID $volume", $dm_info);
    return $dm_info;
}

function detach_vol($volume)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/detach_vol.sh $username $volume", $dm_info);
    return $dm_info;
}

function create_net($vlan, $network, $netmask, $gateway, $start_ip, $end_ip)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/create_net.sh '$username' '$vlan' '$network' '$netmask' '$gateway' '$start_ip' '$end_ip'", $dm_info);
    return $dm_info;
}

function create_link($vlan, $shared, $desc)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/create_link.sh '$username' '$vlan' '$shared' '$desc'", $dm_info);
    return $dm_info;
}

function clear_net($vlan, $network)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/clear_net.sh $username $vlan $network", $dm_info);
    return $dm_info;
}

function clear_link($vlan)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/clear_link.sh $username $vlan", $dm_info);
    return $dm_info;
}

function create_vol($size, $image, $desc)
{
    $username = $_SESSION["username"];
    if ($image != "") {
        exec("/opt/cloudland/scripts/frontend/create_volume_from_image.sh '$username' '$image' '$size' '$desc'", $dm_info);
    } else if ($size != "") {
        exec("/opt/cloudland/scripts/frontend/create_volume.sh '$username' '$size' '$desc'", $dm_info);
    }
    return $dm_info;
}

function delete_vol($name)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/delete_volume.sh $username $name", $dm_info);
    return $dm_info;
}

function get_vol_list()
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/list_volume.sh $username", $dm_info);
    return $dm_info;
}

function get_img_by_name($name)
{
    $image_info = array();
    $info = array();
    exec("/usr/bin/swift -A http://9.110.51.245:8080/auth/v1.0 -U system:root -K testpass stat images $name", $info);
    $image_info = array("img_name" => $info[2], "img_size" => $info[4], "img_version" =>$info[5]);

    return $image_info;
}

function upload_image_from_url($url, $shared, $desc, $platform)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/upload_image_from_url.sh '$username' '$url' '$shared' '$desc' '$platform'", $dm_info);
    return $dm_info;
}

function upload_image($file)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/upload_image.sh $username $file", $dm_info);
    return $dm_info;
}

function get_vm_list($vm_ID)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/list_vm.sh $username $vm_ID", $dm_info);
    return $dm_info;
}

function get_img_list()
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/list_image.sh $username", $dm_info);
    return $dm_info;
}

function delete_img($img_name)
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/delete_image.sh $username $img_name", $dm_info);
    return $dm_info;
}

function get_net_list()
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/list_net.sh $username", $dm_info);
    return $dm_info;
}

function get_link_list()
{
    $username = $_SESSION["username"];
    exec("/opt/cloudland/scripts/frontend/list_link.sh $username", $dm_info);
    return $dm_info;
}

?>

