<?php
/**
 * This is the default configuration of 2 different cache mechanizm
 * 
 */
return array(
    // This cache is used the disk file system to store date with the following options.
    'fileCache' => array(
        'cache_dir' => './data/cache',
        'namespace' => 'systemCache',
        'dir_level' => 2,
        'filePermission' => 0666,
        'dirPermission' => 0755
    ),
    // This is a distributed memory object caching system
    // to use this cache you have to install PHP ext/memcached extension.
    'memcached' => array(
        'lifetime' => 7200,
        'options' => array(
            'servers' => array(
                array(
                    '127.0.0.1',
                    11211 // For me my localhost is my memcached server.
                                )
            ),
            'namespace' => 'SystemMemCache',
            'liboptions' => array(
                'COMPRESSION' => true,
                'binary_protocol' => true,
                'no_block' => true,
                'connect_timeout' => 100
            )
        )
    )
    
);