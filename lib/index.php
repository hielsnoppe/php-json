<?php

namespace NielsHoppe\jSON;

require('vendor/autoload.php');

$main = new Example('Fridolin');

print_r($main->jsonSerialize());
