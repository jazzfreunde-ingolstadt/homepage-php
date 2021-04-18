<?php
function legacy (string $path) {
    return realpath($_SERVER["DOCUMENT_ROOT"] . '/www/legacy/' . $path);
}