<?php
namespace App\Traits;

trait Versionable {
    const REF_SYSTEM_USER = 0;

    public function save(array $options = []) {
        if (empty($this->{$this->getKeyName()})) {
            return $this->createNewRegister($options);
        } else {
            return $this->updateExistingRegister($options);
        }
    }

    protected function createNewRegister(array $options = []){
        $this->version ??= 1;
        $this->created_by = self::getUserPerformer();
        $this->created_at = now();
        $this->updated_by = self::getUserPerformer();
        $this->updated_at = now();

        parent::save($options);

        if(empty($this->ref_origin_register)) {
            $this->ref_origin_register = $this->id;
        }

        return parent::save($options);
    }

    protected function updateExistingRegister(array $options = [])
    {
        $clone = $this->replicate();

        $old = self::find($this->id);

        $this->fill($old->toArray());

        $this->updated_by = self::getUserPerformer();
        $this->updated_at = now();
        $this->deleted_by = self::getUserPerformer();
        $this->deleted_at = now();

        parent::save($options);

        $clone->version = $this->version + 1;
        $clone->ref_last_register = $this->id;
        $clone->ref_origin_register = $this->ref_origin_register ?? $this->id;
        $clone->created_by = self::getUserPerformer();
        $clone->created_at = now();

        return $clone->save();
    }

    public function delete()
    {
        $this->deleted_at = now();
        $this->deleted_by = self::getUserPerformer();

        return parent::save();
    }

    private static function getUserPerformer(){
        return $GLOBALS['ref_user'] ?? self::REF_SYSTEM_USER;
    }
}
