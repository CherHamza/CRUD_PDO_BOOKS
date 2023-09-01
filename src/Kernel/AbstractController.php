<?php

namespace hamza\pdo\Kernel;

class AbstractController
{
    private ?string $flashMessage = null;

    public function getFlashMessage()
    {
        return $this->flashMessage;
    }

    public function setFlashMessage(string $message, string $type)
    {
        if ($type === 'success') {
            $this->flashMessage = "<div class='alert alert-success text-center' role='alert'>$message</div>";
            return $this;
        }
        if ($type === 'error') {
            $this->flashMessage = "<div class='alert alert-danger text-center' role='alert'>$message</div>";
            return $this;
        }
        $this->flashMessage = "<p>$message</p>";
        return $this;
    }
}
