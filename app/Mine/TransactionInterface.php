<?php namespace App\Mine;

interface TransactionInterface
{
    public function handleForDatatables();
    public function handleById($id);
    public function handleStore(array $data);
    public function handleUpdate(array $data);
    public function handleSoftDelete($id);
    public function handleRestoreSoftDelete($id);
    public function handleHardDelete($id);
}
