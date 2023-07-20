<?php

namespace Core\Http;

class Request
{

    /**
     * @var array
     */
    private array $server;

    /**
     * @var array|null
     */
    private ?array $post;

    /**
     * @var array|null
     */
    private ?array $get;


    public function __construct()
    {
        $this->server = $_SERVER;
        $this->post = $_POST;
        $this->get = $_GET;
    }


    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->server['REQUEST_URI'];
    }


    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }


    /**
     * @return array|null
     */
    public function getPost(): ?array
    {
        return $this->post;
    }


    /**
     * @param array|null $post
     * @return $this
     */
    public function setPost(?array $post): self
    {
        $this->post = $post;
        return $this;
    }


    /**
     * @param array|null $get
     * @return $this
     */
    public function setGet(?array $get): self
    {
        $this->post = $get;
        return $this;
    }


    /**
     * @return array|null
     */
    public function getGet(): ?array
    {
        return $this->get;
    }


    /**
     * @return void
     */
    public function unsetPost(): void
    {
        unset($this->post);
    }


}
