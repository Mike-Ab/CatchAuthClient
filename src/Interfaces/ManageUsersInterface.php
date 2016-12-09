<?php

namespace CatchAuthClient\Interfaces;

interface ManageUsersInterface
{
    public function addUser();
    public function listUsers();
    public function getUser();
    public function isPassSetup();
    public function delUser();
    public function deactivateUser();
    public function activateUser();
    public function setPassword();
    public function resetPassword();
//    public function authenticate();
    public function register();
//    public function checkEmailExists();
}