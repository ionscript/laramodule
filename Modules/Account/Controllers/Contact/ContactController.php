<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Account\Controllers\Controller;
use Modules\Account\Model\Contact\Contact;

class ContactController extends Controller
{
    private $request;
    private $contact;

    public function __construct(Request $request, Contact $contact)
    {
        $this->request = $request;
        $this->contact = $contact;
    }

    public function indexAction()
    {
        return $this->list();
    }

    public function addAction()
    {
        return $this->form();
    }

    public function createAction()
    {
        $this->formValidator()->validate();
        $data = $this->request->all();

        $data['call_center_id'] = $this->guard()->user()->callcenter()->id;
        $this->contact->addContact($data);

        return redirect(route('account.contact'))->with('success', 'Success');
    }

    public function editAction()
    {
        return $this->form();
    }

    public function updateAction()
    {
        $this->formValidator()->validate();

        $id = $this->request->input('id');
        $data = $this->request->all();

        $data['call_center_id'] = $this->guard()->user()->callcenter()->id;

        $this->contact->editContact($id, $data);

        return redirect(route('account.contact'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->contact->deleteContact($this->request->input('selected'));

        return redirect(route('account.contact'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['contacts'] = $this->contact->getContactsByCallCenterId($this->guard()->user()->callcenter()->id);

        return $this->template('contact.contact.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {
            $data = $this->contact->getContact($this->request->input('id'));
            $data['action'] = route('account.contact.update', ['id' => $this->request->input('id')]);

        } else {
            $data = [];
            $data['action'] = route('account.contact.create');
        }

        return $this->template('contact.contact.form', $data);
    }

    public function formValidator()
    {
        return Validator::make($this->request->all(), [
            'phone' => ['required', 'string', 'max:255', 'unique:contact'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contact']
        ]);
    }

    public function deleteValidator()
    {
        return Validator::make($this->request->all(), [
            'selected' => ['required', 'array']
        ]);
    }
}
