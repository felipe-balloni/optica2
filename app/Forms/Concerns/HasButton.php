<?php

namespace App\Forms\Concerns;

trait HasButton
{
    protected $buttonAction = null;

    public function buttonAction(?callable $callback): static
    {
        $this->buttonAction = $callback;

        return $this;
    }

    public function callButtonAction(): static
    {
        if ($callback = $this->buttonAction) {
            $this->evaluate($callback);
        }

        return $this;
    }
}
