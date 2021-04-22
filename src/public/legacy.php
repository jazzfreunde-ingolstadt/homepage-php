<?php
function legacy (string $path) {
    return realpath($_SERVER["DOCUMENT_ROOT"] . '/legacy/' . $path);
}