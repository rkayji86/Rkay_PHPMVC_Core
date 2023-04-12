<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public const TYPE_TXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_EMAIL = 'email';
    public const TYPE_NUMBER = 'number';

    public string $type;
    public Model $model;
    public string $attribute;

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TXT;
    }

    public function __toString(): string
    {
        return sprintf('<div class="form-group mb-3">
                    <label class="form-label">%s</label>
                    <input type="%s" name="%s" autocomplete="off" value="%s" class="form-control%s">
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>',
            $this->model->getLabels($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}