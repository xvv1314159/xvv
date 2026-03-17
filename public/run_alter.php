<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=www_xvv_cc;charset=utf8mb4', 'www_xvv_cc', 'SHjQ7kW6b44dd18R');
$sqls = [
    "ALTER TABLE `admin_configs` MODIFY `create_time` int(11) NOT NULL DEFAULT 0, MODIFY `update_time` int(11) NOT NULL DEFAULT 0",
    "ALTER TABLE `plugins` MODIFY `create_time` int(11) NOT NULL DEFAULT 0, MODIFY `update_time` int(11) NOT NULL DEFAULT 0",
    "ALTER TABLE `blog_categories` MODIFY `create_time` int(11) NOT NULL DEFAULT 0, MODIFY `update_time` int(11) NOT NULL DEFAULT 0",
    "ALTER TABLE `blog_comments` MODIFY `create_time` int(11) NOT NULL DEFAULT 0, MODIFY `update_time` int(11) NOT NULL DEFAULT 0",
    "ALTER TABLE `blog_posts` MODIFY `create_time` int(11) NOT NULL DEFAULT 0, MODIFY `update_time` int(11) NOT NULL DEFAULT 0",
    "ALTER TABLE `blog_tags` MODIFY `create_time` int(11) NOT NULL DEFAULT 0, MODIFY `update_time` int(11) NOT NULL DEFAULT 0",
];
foreach ($sqls as $sql) {
    try {
        $pdo->exec($sql);
        echo "OK: " . substr($sql, 0, 60) . "\n";
    } catch (Exception $e) {
        echo "ERR: " . $e->getMessage() . "\n";
    }
}
echo "done\n";
// 执行完后删除自身
unlink(__FILE__);
