<?php

require __DIR__.'/lib/base.php';

//F3::set('CACHE',TRUE);
F3::set('DEBUG', 3);
F3::set('UI', 'ui/');

F3::set('DB', new DB\SQL(
                'mysql:host=localhost;port=3306;dbname=jjtx_dev',
                'jjtx_dev',
                'jjtx@dev41212102'
        )
);

F3::route('GET /',
	function () {
        echo "hello world";
	}
);

F3::run();
?>