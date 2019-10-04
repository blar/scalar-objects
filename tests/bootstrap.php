<?php

use Blar\ScalarObjects\ArrayHandler;
use Blar\ScalarObjects\BoolHandler;
use Blar\ScalarObjects\FloatHandler;
use Blar\ScalarObjects\IntegerHandler;
use Blar\ScalarObjects\StringHandler;

require __DIR__ . '/../vendor/autoload.php';

register_primitive_type_handler('array', ArrayHandler::class);
register_primitive_type_handler('bool', BoolHandler::class);
register_primitive_type_handler('float', FloatHandler::class);
register_primitive_type_handler('int', IntegerHandler::class);
register_primitive_type_handler('string', StringHandler::class);
