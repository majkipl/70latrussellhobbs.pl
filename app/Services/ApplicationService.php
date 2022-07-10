<?php

namespace App\Services;

use App\Http\Requests\StoreApplicationRequest;
use App\Mail\ApplicationMail;
use App\Models\Application;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicationService
{

    public function store(array $data, StoreApplicationRequest $request): Application
    {
        DB::beginTransaction();

        try {
            $application = new Application($data);

            if( $request->file('img_receipt') ) {
                $application->img_receipt = $request->file('img_receipt')->store('receipts');
            }
            if( $request->file('img_ean_1') ) {
                $application->img_ean_1 = $request->file('img_ean_1')->store('eans');
            }
            if( $request->file('img_ean_2') ) {
                $application->img_ean_2 = $request->file('img_ean_2')->store('eans');
            }

            $params = $request->all();

            $application->product_1_id = $params['product_1'];
            $application->product_2_id = $params['product_2'];
            $application->shop_id = $params['shop'];
            $application->whence_id = $params['whence'];
            $application->type_shop_id = $params['type_shop'];

            $application->is_product_2 = array_key_exists('is_product_2', $params);

            $application->legal_1 = array_key_exists('legal_1', $params);
            $application->legal_2 = array_key_exists('legal_2', $params);
            $application->legal_3 = array_key_exists('legal_3', $params);
            $application->legal_4 = array_key_exists('legal_4', $params);

            $application->save();

            DB::commit();

            return $application;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception('Nie można zapisać zgłoszenia');
        }
    }

    /**
     * @param string $email
     * @param int $id
     * @return void
     */
    public function sendMail(string $email, int $id): void
    {
        Mail::to($email)->send(new ApplicationMail(['id' => $id]));
    }
}
