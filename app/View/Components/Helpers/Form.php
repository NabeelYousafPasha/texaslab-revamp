<?php

namespace App\View\Components\Helpers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $id
     * @param string $name
     * @param string $method
     * @param string $action
     * @param boolean|null $enctype
     * @param string|null $spoofedType
     */
    public function __construct(
        public string $id,
        public string $name,
        public string $method = 'POST',
        public string $action = 'javascript::void(0)',
        public ?bool $enctype = false,
        public ?string $spoofedType = null,
    ) {
        $this->methodSpoofing();   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.helpers.form');
    }

    /**
     *
     * @return string
     */
    public function enctypeFormAttribute(): string
    {
        return $this->enctype 
            ? "enctype=multipart/form-data"
            : "";
    }

    /**
     * Perform Method Spoofing
     *
     * @return void
     */
    protected function methodSpoofing(): void
    {
        if (in_array($this->method, ['PUT', 'PATCH', 'DELETE'])) {
            $this->spoofedType = $this->method;
            $this->method = 'POST';
        }
    }
}
