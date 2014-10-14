<?php
namespace ZF2Booster;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                // global service for filesystem cache.
                'Zend\Cache\Storage\Filesystem' => function ($sm)
                {
                    $config = $sm->get('config');
                    $fileCache = $config['fileCache'];
                    $cache = \Zend\Cache\StorageFactory::factory(
                        array(
                            'adapter' => 'filesystem',
                            'plugins' => array(
                                'exception_handler' => array(
                                    'throw_exceptions' => true
                                ),
                                'serializer'
                            )
                        ));
                    $cache->setOptions($fileCache);
                    
                    return $cache;
                },
                // Global service for memcached cache
                'Zend\Cache\Storage\Memcached' => function ($sm)
                {
                    $config = $sm->get('config');
                    $memOption = $config['memcached'];
                    $cache = \Zend\Cache\StorageFactory::factory(
                        array(
                            'adapter' => array(
                                'name' => 'memcached',
                                'lifetime' => $memOption['lifetime'],
                                'options' => $memOption['options']
                            ),
                            'plugins' => array(
                                'exception_handler' => array(
                                    'throw_exceptions' => false
                                )
                            )
                        ));
                    return $cache;
                }
            )
        );
    }
}
