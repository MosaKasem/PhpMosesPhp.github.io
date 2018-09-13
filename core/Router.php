<?php
class Router {
    protected $routes = [];
    protected $params = [];

    public function add($route, $params)
    {
        // convert route to regular expression
        $route = preg_replace('/\//', '\\/', $route);
        
        // Convert variable to {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z]+)', $route);

        // add delimiters, case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
    public function match($url)
    {
        foreach($this->routes as $route => $params)
        {
            if (preg_replace($route, $url, $matches))
            {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function getParams()
    {
        return $this->params;
    }
}