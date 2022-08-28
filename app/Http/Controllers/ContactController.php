<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactStoreRequest;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::all();
        return response()->json([
            'contacts' => $contacts
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Create Contact
     * @OA\Post (
     *     path="/api/contacts",
     *     tags={"Contact"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="first_name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "first_name":"Diego",
     *                     "email":"dmartinez@tiqal.com"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="first_name", type="string", example="Diego"),
     *              @OA\Property(property="email", type="string", example="dmartinez@tiqal.com"),
     *              @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */
    public function store(ContactStoreRequest $request)
    {
        try {
            Contact::create([
                'first_name' => $request->first_name,
                'email' => $request->email
            ]);
            return response()->json([
                'message' => "Created!"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "ERROR!"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json([
                'message' => 'Not Found!'
            ], 404);
        }
        return response()->json([
            'contact' => $contact
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(ContactStoreRequest $request, $id)
    {
        //
        try {
            $contact = Contact::find($id);
            if (!$contact) {
                return response()->json([
                    'message' => "Not Found"
                ], 404);
            }

            $contact->first_name = $request->first_name;
            $contact->email = $request->email;

            $contact->save();
            return response()->json([
                'message' => "Updated!"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "ERROR!"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json([
                'message' => "Not Found"
            ], 404);
        }

        $contact->delete();
        return response()->json([
            'message' => "Deleted!"
        ], 200);
    }
}
