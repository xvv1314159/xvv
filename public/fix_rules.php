<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=www_xvv_cc;charset=utf8mb4', 'www_xvv_cc', 'SHjQ7kW6b44dd18R');

$updates = [
    // Config
    ['/admin/Config/groupIndex',   '/admin/Config/group_index'],
    ['/admin/Config/groupAdd',     '/admin/Config/group_add'],
    ['/admin/Config/groupEdit',    '/admin/Config/group_edit'],
    ['/admin/Config/groupDelete',  '/admin/Config/group_delete'],
    ['/admin/Config/configManage', '/admin/Config/config_manage'],
    ['/admin/Config/configAdd',    '/admin/Config/config_add'],
    ['/admin/Config/configEdit',   '/admin/Config/config_edit'],
    ['/admin/Config/configDelete', '/admin/Config/config_delete'],
    ['/admin/Config/uploadImage',  '/admin/Config/upload_image'],
    // Admin
    ['/admin/Admin/uploadAvatar',  '/admin/Admin/upload_avatar'],
    // Index
    ['/admin/Index/getSystemData', '/admin/Index/get_system_data'],
    // Log
    ['/admin/Log/loginLog',        '/admin/Log/login_log'],
    ['/admin/Log/opLog',           '/admin/Log/op_log'],
    ['/admin/Log/clearLoginLog',   '/admin/Log/clear_login_log'],
    ['/admin/Log/clearOpLog',      '/admin/Log/clear_op_log'],
    // Plugin
    ['/admin/Plugin/marketInstall', '/admin/Plugin/market_install'],
    ['/admin/Plugin/marketList',    '/admin/Plugin/market_list'],
    ['/admin/Plugin/setDefault',    '/admin/Plugin/set_default'],
    ['/admin/Plugin/cancelDefault', '/admin/Plugin/cancel_default'],
    // Dev
    ['/admin/Dev/formBuild',        '/admin/Dev/form_build'],
];

$stmt = $pdo->prepare('UPDATE `admin_rules` SET `href` = ? WHERE `href` = ?');
foreach ($updates as [$old, $new]) {
    $stmt->execute([$new, $old]);
    $rows = $stmt->rowCount();
    echo ($rows ? "OK" : "SKIP") . ": $old => $new\n";
}
echo "done\n";
unlink(__FILE__);
