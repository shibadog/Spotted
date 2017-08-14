<?php
namespace Shibadog\Spotted;

use \Silex\Application;
use \Silex\Provider\TwigServiceProvider;

class App extends Application {
    use \Silex\Application\TwigTrait;

    public function __construct() {
        parent::__construct();

        $app = $this;

        $this->register(new TwigServiceProvider(), array(
            'twig.path' => RESOUCE_ROOT . 'templates',
            'twig.options' => ['debug' => true],
            'twig.form.templates' => ['bootstrap_3_layout.html.twig']
        ));

        $this->get('/', function() {
            return 'Hello, World.';
        });

        $this->get('/test/', function () use ($app) {
            return $app['twig']->render('test.twig');
        });
    }
}