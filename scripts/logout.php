<?php
session_start();

// Уничтожаем сессию
session_destroy();

// Возвращаем "success" как подтверждение успешного выхода
echo 'success';
