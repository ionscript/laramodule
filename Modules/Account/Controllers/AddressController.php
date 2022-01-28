<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Http\Request;
use Modules\Account\Model\Address;
use Modules\Account\Model\Localisation;
use Illuminate\Support\Facades\Validator;
use Modules\Account\Model\Office;

class AddressController extends Controller
{
    private $request;
    private $address;
    private $country;
    private $state;
    private $office;

    public function __construct(Request $request, Address $address, Localisation\Country $country, Localisation\State $state, Office $office)
    {
        $this->request = $request;
        $this->address = $address;
        $this->country = $country;
        $this->state = $state;
        $this->office = $office;
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
        $data['sid'] = '';

        $this->address->addAddress($data);

        return redirect(route('account.address'))->with('success', 'Success');
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
        $data['sid'] = '';
        $this->address->editAddress($id, $data);

        return redirect(route('account.address'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->address->deleteAddress($this->request->input('selected'));

        return redirect(route('account.address'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['addresses'] = $this->address->getAddresses();

        return $this->template('address.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->address->getAddress($this->request->input('id'));

            if ($data['office_id']) {
                $office = $this->office->getOffice($data['office_id']);
                $data['default'] = $data['id'] === $office->address_id;
            } else {
                $data['default'] = false;
            }

            $data['action'] = route('account.address.update', ['id' => $this->request->input('id')]);
        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.address.create');
        }

        $data['countries'] = $this->country->getAllCountries();
        $data['states'] = [];

        return $this->template('address.form', $data);
    }

    public function formValidator()
    {
        return Validator::make($this->request->all(), [
            'name' => ['required', 'string', 'max:32'],
            'address_1' => ['required', 'string', 'max:255'],
//            'address_2' => ['string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
//            'postcode' => ['string', 'max:255'],
            'country_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
        ]);
    }

    public function deleteValidator()
    {
        return Validator::make($this->request->all(), [
            'selected' => ['required', 'array']
        ]);
    }

    public function stateAjax() {
        $json = $this->state->getStatesByCountryId($this->request->input('id'));

        return response()->json($json);
    }
}
