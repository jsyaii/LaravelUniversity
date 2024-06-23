<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Users extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array Holds template data to be passed to views.
     */
    protected $TPL;

    /**
     * Constructor to initialize template variables.
     */

    public function __construct()
    {
        $this->TPL = [];
        $this->TPL['changed_name'] = false;
        $this->TPL['delete_name'] = false;
        $this->TPL['show_create'] = false;
        $this->TPL['show_edit_form'] = false;
    }

    /**
     * Retrieves all users from the database and displays them.
     *
     * @return \Illuminate\View\View
     */

    public function show_users()
    {
        $records = DB::select("SELECT * FROM users");

        $this->TPL["records"] = $records;
        return view("manage", $this->TPL);
    }

    /**
     * Shows the user creation form.
     *
     * @return \Illuminate\View\View
     */

    public function show_form()
    {
        $this->TPL['show_create'] = true;
        return $this->show_users();
    }

    /**
     * Shows the user edit form.
     *
     * @return \Illuminate\View\View
     */
    public function show_edit_form()
    {
        $this->TPL['show_edit_form'] = true;
        return $this->show_users();
    }

    /**
     * Changes the name of a user to 'Bob' for the given user ID. This is just more for me to test to see if the 
     * SQL query will execute.
     *
     * @param int $id User ID
     * @return \Illuminate\View\View
     */

    public function changeName($id)
    {
        DB::update("UPDATE users SET first_name='it is now Bob' WHERE id=?", [$id]);
        $this->TPL['admin_id'] = $id;
        $this->TPL['changed_name'] = $id;
        return $this->show_users();
    }

    /**
     * Updates a user's details with the provided information.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id User ID
     * @return \Illuminate\View\View
     */
    public function changeName2(Request $request, $id)
    {
        $this->TPL['updated_name'] = $request->input("new_name");
        $this->TPL['updated_lastname'] = $request->input("new_lastname");
        $this->TPL['updated_age'] = $request->input("new_age");
        $this->TPL['updated_email'] = $request->input("new_email");

        $updateData = [];

        if (!empty($this->TPL['updated_name'])) {
            $updateData['first_name'] = $this->TPL['updated_name'];
        }

        if (!empty($this->TPL['updated_lastname'])) {
            $updateData['last_name'] = $this->TPL['updated_lastname'];
        }

        if (!empty($this->TPL['updated_age'])) {
            $updateData['age'] = $this->TPL['updated_age'];
        }

        if (!empty($this->TPL['updated_email'])) {
            $updateData['email'] = $this->TPL['updated_email'];
        }

        if (!empty($updateData)) {
            DB::table('users')
                ->where('id', $id)
                ->update($updateData);
        }

        $this->TPL['updatedID'] = $id;

        return $this->show_users();
    }


    /**
     * Deletes a user with the given ID.
     *
     * @param int $id User ID
     * @return \Illuminate\View\View
     */

    public function deleteRecord($id)
    {
        DB::delete("DELETE FROM users WHERE id=?", [$id]);
        $this->TPL['delete_id'] = $id;
        $this->TPL['delete_name'] = $id;
        return $this->show_users();
    }

    /**
     * Creates a new user with the provided details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function createRecord(Request $request)
    {
        $this->TPL['first_name'] = $request->input("first_name");
        $this->TPL['last_name'] = $request->input("last_name");
        $this->TPL['age'] = $request->input("age");
        $this->TPL['email'] = $request->input("email");

        DB::insert(
            "INSERT INTO users (id, first_name, last_name, age, email) VALUES (NULL, ?, ?, ?, ?)",
            [
                $this->TPL["first_name"],
                $this->TPL["last_name"],
                $this->TPL["age"],
                $this->TPL["email"]
            ]
        );

        return $this->show_users();
    }
}
