<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait Versionable {
    public function save(array $options = []) {
        if (empty($this->id)) {
            return $this->createNewRegister($options);
        } else {
            return $this->updateExistingRegister($options);
        }
    }

    protected function createNewRegister(array $options = []){
        $this->version = 1;
        $this->created_by = self::REF_SYSTEM_USER;
        $this->created_at = now();

        parent::save($options);

        $this->ref_origin_register = $this->id;

        return parent::save($options);
    }

    protected function updateExistingRegister(array $options = [])
    {
        $this->updated_by = self::REF_SYSTEM_USER;
        $this->updated_at = now();
        $this->deleted_by = self::REF_SYSTEM_USER;
        $this->deleted_at = now();

        parent::save($options);

        $clone = $this->replicate();
        $clone->version = $this->version + 1;
        $clone->ref_last_register = $this->id;
        $clone->ref_origin_register = $this->ref_origin_register ?? $this->id;
        $clone->created_by = self::REF_SYSTEM_USER;
        $clone->created_at = now();

        return $clone->save();
    }

    public function delete()
    {
        $this->deleted_at = now();

        return parent::save();
    }
}
