<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'ZF2Booster\Controller\ZF2Booster' => 'ZF2Booster\Controller\ZF2BoosterController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'ZF2Booster' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/zf2booster[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ZF2Booster\Controller\ZF2Booster',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'zf2Booster' => __DIR__ . '/../view',
        ),
    ),
);