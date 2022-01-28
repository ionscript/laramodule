<?php

declare(strict_types=1);

namespace Modules\Account\Model\Contact;


use Modules\Account\Model\Eloquent;

class Contact extends Eloquent
{
    protected $table = 'contact';

    protected $fillable = [
        'call_center_id',
        'agent_id',
        'contact_phone_id',
        'firstname',
        'lastname',
        'description',
        'email',
        'is_public'
    ];

    protected $hidden = [

    ];

    public function getContact($id)
    {
        return $this->find($id);
    }

    public function getContacts($limit = 20)
    {
        return $this->paginate($limit);
    }

    public function addContact($data)
    {
        return $this->insert($data);
    }

    public function editContact($id, $data)
    {
        $this->where('id', $id)->update($data);
    }

    public function deleteContact($id)
    {
        $this->where('id', $id)->delete();
    }

    public function getContactByUsername($agentname)
    {
        return $this->where('username', $agentname)->first();
    }

    public function getContactByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getContactsByCallCenterId($call_center_id, $limit = 20)
    {
        return $this->where('call_center_id', $call_center_id)->paginate($limit);
    }
}
