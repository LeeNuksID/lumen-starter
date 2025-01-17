<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param  \App\Models\User  $user
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            'id'        => (int) $user->id,
            'name'      => (string) $user->name,
            'email'     => (string) $user->email,
            'no_hp'     => (string) $user->no_hp,
            'provinsi'  => (string) $user->provinsi,
            'kota'      => (string) $user->kota,
            'kecamatan' => (string) $user->kecamatan,
        ];
    }
}
