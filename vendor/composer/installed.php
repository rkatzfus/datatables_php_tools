<?php return array(
    'root' => array(
        'name' => 'datatableswebutility/dwuty',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => 'f624d47ecee9c799e1da1a4c27d98c570a10edd0',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'components/jquery' => array(
            'pretty_version' => '3.6.0',
            'version' => '3.6.0.0',
            'reference' => '6cf38ee1fd04b6adf8e7dda161283aa35be818c3',
            'type' => 'component',
            'install_path' => __DIR__ . '/../components/jquery',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'datatables.net/datatables.net' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '85c049199a0832d750c188477b3ad9adca688fa5',
            'type' => 'library',
            'install_path' => __DIR__ . '/../datatables.net/datatables.net',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'datatables.net/datatables.net-bs5' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '72fb44004a0b7c32e369c7f77eca19fe30c337d9',
            'type' => 'library',
            'install_path' => __DIR__ . '/../datatables.net/datatables.net-bs5',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'datatableswebutility/dwuty' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => 'f624d47ecee9c799e1da1a4c27d98c570a10edd0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'select2/select2' => array(
            'pretty_version' => '4.0.13',
            'version' => '4.0.13.0',
            'reference' => '45f2b83ceed5231afa7b3d5b12b58ad335edd82e',
            'type' => 'component',
            'install_path' => __DIR__ . '/../select2/select2',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.1.3',
            'version' => '5.1.3.0',
            'reference' => '1a6fdfae6be09b09eaced8f0e442ca6f7680a61e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.1.3',
            ),
        ),
    ),
);
