<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;

/**
 * Trait UserAttribute.
 */
trait HotelAttribute
{
    /**
     * @param $password
     */

    public function getEditButtonAttribute()
    {
//        return '<a href="'.route('admin.hotel.edit', $this).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.hotel.destroy', $this).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }


    public function getActionButtonsAttribute()
    {

        return '<div class="btn-group btn-group-sm" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">
			  '.$this->edit_button.'
			  '.$this->delete_button.'
			</div>';
    }

}
