<?php

namespace Model;

class User {
    private $name = null;

    public function setName(string $newName) {
        $this->name = $newName;
    }
    public function getUserName() {
        return $this->name;
    }
    public function isLoggedIn() : bool {
        return $this->name != null;
    }
}