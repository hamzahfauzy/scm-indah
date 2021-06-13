<?php
namespace src;

class Redirect
{
    private $route = '';
    private $params = [];
    function route($route,$params = [])
    {
        $this->params = array_merge($this->params, $params);
        $this->route = $route;
        return $this;
    }

    function with($params, $add_params = false)
    {
        if(is_array($params))
            $this->params = array_merge($this->params, $params);
        else
            $this->params = array_merge($this->params, [$params => $add_params]);
        return $this;
    }

    function withMessage($params, $add_params = false)
    {
        if(is_array($params))
            foreach($params as $key => $value)
                session()->set_flash($key, $value);
        else
            session()->set_flash($params, $add_params);
        return $this;
    }

    function __destruct()
    {
        $params = http_build_query($this->params);
        if($params)
            $this->route .= '&'.$params;
        // return $route;
        return header('location: index.php?r='.$this->route);
    }

}