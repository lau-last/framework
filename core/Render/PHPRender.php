<?php

namespace Core\Render;

class PHPRender
{


    /**
     * @param string $view
     * @param array|null $data
     * @return void
     */
    public function render(string $view, ?array $data = []): void
    {
        ob_start();
        extract($data);
        require VIEW_PATH . str_replace('.', DIRECTORY_SEPARATOR, $view) . '.php';
        $content = ob_get_clean();
        require VIEW_PATH . TEMPLATE . '.php';
    }


    /**
     * @param $uri
     * @return void
     */
    public function redirect($uri): void
    {
        header("Location: $uri");
    }


}
