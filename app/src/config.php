<?php
//エラーを保存する。
ini_set("log_errors","on");

//エラーをerror.logに保存する。
ini_set("error_log","htdocs/error.log");//※htdocsの外にerror.logを配置するとPermission denied
// ini_set("error_log","../app/logs/error.log");
