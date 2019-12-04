<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "vendor/autoload.php";

$faker = \Faker\Factory::create("fr_FR");

echo $faker->company;

