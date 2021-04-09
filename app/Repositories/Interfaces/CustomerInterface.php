<?php


namespace App\Repositories\Interfaces;

interface CustomerInterface
{
    public function show($idCustomer);

    public function store($data);

    public function delete($idCustomer);

    public function update($idCustomer, $data);
}
