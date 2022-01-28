<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Contact;

use Illuminate\Http\Request;
use Modules\Account\Controllers\Controller;
use Modules\Account\Model\Contact\Note;

class NoteController extends Controller
{
    private $note;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function indexAction()
    {
        return $this->template('agent.contact-note.list');
    }

    public function addAction(Request $request)
    {
        if($request->getMethod() === 'POST') {
            $this->note->addContact($request->all());

            return redirect('/account/agent/contact-note')->with('success', 'Success');
        }

        $data = $request->all();
        $data['action'] = '/account/agent/contact-note/add';
        $data['notes'] = $this->note->getAllNotes();

        return $this->template('agent.contact-note.form', $data);
    }

    public function editAction(Request $request)
    {
        $id = $request->input('id');


        if($id && $request->getMethod() === 'POST') {
            $this->note->editNote($id, $request->all());

            return redirect('/account/agent/contact-note')->with('success', 'Success');
        }

        $data = $this->note->getNote($id);
        $data['action'] = '/account/agent/contact-note/edit?id='. $id;
        $data['notes'] = $this->note->getAllNotes();

        return $this->template('agent.contact-note.form', $data);
    }

    public function deleteAction(Request $request)
    {
        $id = $request->input('id');

        if($id) {
            $this->note->deleteNote($id);
        }

        return redirect('/account/agent/contact-note')->with('success', 'Success');
    }
}
