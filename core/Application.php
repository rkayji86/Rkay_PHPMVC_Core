<?php

namespace app\core;

class Application
{
    public string $layout = 'main';

    public string $userClass;
    public Router $router;
    public Request $request;

    public Response $response;
    public Database $db;

    public Session $session;

    public static string $ROOT_DIR;
    public static Application $app;
    public ?Controller $controller = null;
    public ?DbModel $user;

    public function __construct($rootpath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootpath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $user = new $this->userClass;
            $primaryKey = $user->primarykey();
            $this->user = $user->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public static function isGest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};

        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

}