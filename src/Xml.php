<?php

namespace ConsistentPHP;

class Xml extends ConsistentBase {
    public function load(string $file): self {
        $this->value = simplexml_load_file($file);
        return $this;
    }

    public function loadString(string $data): self {
        $this->value = simplexml_load_string($data);
        return $this;
    }

    public function toArray(): array {
        return json_decode(json_encode($this->value), true);
    }

    public function asXml(): string {
        return $this->value->asXML();
    }

    public function save(string $file): self {
        $this->value->asXML($file);
        return $this;
    }

    public function getValueFromPath(string $path) {
        return $this->value->xpath($path);
    }

    public function addChild(string $name, string $value = null): self {
        $this->value->addChild($name, $value);
        return $this;
    }

    public function removeChild(string $name): self {
        if (isset($this->value->$name)) {
            unset($this->value->$name);
        }
        return $this;
    }
}