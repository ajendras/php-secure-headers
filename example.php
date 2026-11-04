<?php
require __DIR__ . '/SecureHeaders.php';

$h = new SecureHeaders();
$nonce = $h->nonce();
$h->send();
?>
<!DOCTYPE html>
<html><body><script nonce="<?= $nonce ?>">console.log('secure');</script></body></html>